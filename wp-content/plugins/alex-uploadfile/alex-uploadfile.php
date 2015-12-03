<?php
/*
Plugin Name: Upload image
Plugin URI: http://shebalov.ru
Description: Upload image from admin panel
Version: 1.0
Author: Alexey Shebalov
Author URI: http://shebalov.ru
*/

add_action('admin_menu', 'alex_upload_file');
add_action('admin_init', 'alex_setting');

//добавляем страницу для опции (внешнее оформление)
function alex_upload_file(){
	add_options_page( 'Главные опции', 'Главные опции', 'manage_options', 'alex_upload_file_option', 'alex_f_make_page');
}

// регистрация опций и генерация полей для ввода
function alex_setting(){
	register_setting( 'alex_options_group', 'alex_upload_file_option', 'alex_option_sanitize');
	add_settings_section( 'alex_options_section', 'Шапка', '', 'alex_upload_file_option');
	add_settings_section( 'alex_options_section_footer', 'Подвал', '', 'alex_upload_file_option');
	add_settings_section( 'alex_options_section_phone', 'Во всех блоках', '', 'alex_upload_file_option');
	// add_settings_field('alex_color_bg_id', 'Цвет фона', 'alex_color_bg_cb',  'alex_upload_file_option', 'alex_options_section', array('label_for' => 'alex_color_bg_id') );

	add_settings_field('alex_header_bigres_img_id', 'Добавить логотип (для белого фона)', 'alex_header_bigres_img_cb',  'alex_upload_file_option', 'alex_options_section', array('label_for' => 'alex_header_bigres_img_id') );
	add_settings_field('alex_del_header_bigres_img_id', 'Удалить логотип', 'alex_del_header_bigres_img_cb',  'alex_upload_file_option', 'alex_options_section', array('label_for' => 'alex_del_header_bigres_img_id') );
	add_settings_field('alex_header_img_id', 'Добавить логотип (для синего фона)', 'alex_header_img_cb',  'alex_upload_file_option', 'alex_options_section', array('label_for' => 'alex_header_img_id') );
	add_settings_field('alex_del_header_img_id', 'Удалить логотип', 'alex_del_header_img_cb',  'alex_upload_file_option', 'alex_options_section', array('label_for' => 'alex_del_header_img_id') );	
	add_settings_field('alex_add_phone_id', 'Добавить телефон', 'alex_add_phone_cb',  'alex_upload_file_option', 'alex_options_section_phone', array('label_for' => 'alex_add_phone_id') );
	add_settings_field('alex_footer_img_id', 'Добавить логотип', 'alex_footer_img_cb',  'alex_upload_file_option', 'alex_options_section_footer', array('label_for' => 'alex_footer_img_id') );
	add_settings_field('alex_del_footer_img_id', 'Удалить логотип', 'alex_del_footer_img_cb',  'alex_upload_file_option', 'alex_options_section_footer', array('label_for' => 'alex_del_footer_img_id') );
}

function alex_color_bg_cb(){
	$option = get_option('alex_upload_file_option' );
	print_r($option);
	?>
	 <input type="text" class="regular-text" id="alex_color_bg_id" name="alex_upload_file_option[alex]" value="<?php echo esc_attr($option['alex']); ?>"> 
	<?php
}

function alex_add_phone_cb(){
	$option = get_option('alex_upload_file_option' );
	// print_r($option);

	if(empty($option['phone'])){
		?>
		 <input type="text" class="regular-text" id="alex_add_phone_id" name="alex_upload_file_option[phone]" value="<?php echo esc_attr($option['alex']); ?>"> 
		<?php
	}else{
		?>
		<input type="text" class="regular-text" id="alex_add_phone_id" name="alex_upload_file_option[phone]" value="<?php echo $option['phone'];?>">
		<?php
	}
}

function alex_header_img_cb(){
	$option = get_option('alex_upload_file_option' );
	?>
	 <input type="file" id="alex_header_img_id" name="uploadfile"> 
	<?php
	if(!empty($option['url_file'])){
		echo "<p><img src='{$option['url_file']}' alt='logo' width='200'></p>";
	}
	else echo "<p><img src='" . get_template_directory_uri() ."/images/head/mdbx_logo_white.svg' alt='logo' style='max-width: 200px;
    max-height: 70px;'></p>";
}

function alex_header_bigres_img_cb(){
	$option = get_option('alex_upload_file_option' );
	?>
	 <input type="file" id="alex_header_bigres_img_id" name="uploadfile_bigres"> 
	<?php
	if(!empty($option['url_file_bigres'])){
		echo "<p><img src='{$option['url_file_bigres']}' alt='logo' width='200'></p>";
	}
	else echo "<p><img src='" . get_template_directory_uri() ."/images/head/mdbx_logo_blue.svg' alt='logo' style='max-width: 200px;
    max-height: 70px;'></p>";
}

function alex_footer_img_cb(){
	$option = get_option('alex_upload_file_option' );
	?>
	 <input type="file" id="alex_footer_img_id" name="uploadfile2"> 
	<?php
	if(!empty($option['url_file2'])){
		echo "<p><img src='{$option['url_file2']}' alt='logo' width='200'></p>";
	}
	else echo "<p><img src='" . get_template_directory_uri() ."/images/footer/mdbx_logo_tiny.svg' alt='logo' style='max-width: 200px;
    max-height: 70px;'></p>";
}

function alex_del_header_img_cb(){
	?>
	 <input type="checkbox" name="del_header"> 
	<?php
}

function alex_del_header_bigres_img_cb(){
	?>
	 <input type="checkbox" name="del_header_bigres"> 
	<?php
}

function alex_del_footer_img_cb(){
	?>
	 <input type="checkbox" name="del_footer"> 
	<?php
}

function alex_option_sanitize($option){

/*** header logo <1650px ***/	

	if( !empty($_FILES['uploadfile']['tmp_name'])  ){
		$overrides = array('test_form' => false);
		$file = wp_handle_upload( $_FILES['uploadfile'], $overrides );
		$option['url_file'] = $file['url'];
		//print_r($file);
	}
	else{
		$old_option = get_option('alex_upload_file_option' );
		$option['url_file'] = $old_option['url_file'];
	}

	/*** header logo >1650px ***/	

	if( !empty($_FILES['uploadfile_bigres']['tmp_name'])  ){
		$overrides = array('test_form' => false);
		$file = wp_handle_upload( $_FILES['uploadfile_bigres'], $overrides );
		$option['url_file_bigres'] = $file['url'];
		//print_r($file);
	}
	else{
		$old_option = get_option('alex_upload_file_option' );
		$option['url_file_bigres'] = $old_option['url_file_bigres'];
	}

/*** footer logo ***/

	if( !empty($_FILES['uploadfile2']['tmp_name'])  ){
		$overrides = array('test_form' => false);
		$file = wp_handle_upload( $_FILES['uploadfile2'], $overrides );
		$option['url_file2'] = $file['url'];
		//print_r($file);
	}
	else{
		$old_option = get_option('alex_upload_file_option' );
		$option['url_file2'] = $old_option['url_file2'];
	}

	if($_POST['del_header'] == 'on'){
		unset($option['url_file']);
	}

	if($_POST['del_header_bigres'] == 'on'){
		unset($option['url_file_bigres']);
	}

	if($_POST['del_footer'] == 'on'){
		unset($option['url_file2']);
	}

	if( !empty($_POST['phone']) ) $option['phone'] = $_POST['phone'];
	return $option;
}

function alex_f_make_page(){
	?>
	<div class="wrap">
		<h2>Главные опции</h2>
		<form action="options.php" method="post" enctype="multipart/form-data">
			<?php settings_fields( 'alex_options_group' ); //выводит скрытые поля для проверки безопасности ?>
			<?php do_settings_sections( 'alex_upload_file_option' ); // вывод всех полей связанный с секцией ?>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}
