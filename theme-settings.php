<?php

function cuadmin_form_system_theme_settings_alter(&$form, &$form_state) {

$form['cuadmin_theme_settings'] = array(
		'#type' => 'fieldset', 
		'#title' => t('CU Admin Theme Settings'), 
	);
	
	
//Color Options
  $form['cuadmin_theme_settings']['color_options'] = array(
		'#type' => 'fieldset', 
		'#title' => t('Color Options'), 
		'#collapsible' => TRUE, 
		'#collapsed' => TRUE,
	);
  $form['cuadmin_theme_settings']['color_options']['banner_color'] = array(
    '#type' => 'radios', 
    '#title' => t('Banner Color'), 
    '#default_value' => theme_get_setting('banner_color', 'cuadmin') ? theme_get_setting('banner_color', 'cuadmin') : 'banner-dark', 
    '#description' => t('Choose a color that matches your logo graphic.'),
    '#options' => array('banner-white' => t('White'), 'banner-light' => t('Light Grey'), 'banner-dark' => t('Dark Grey'), 'banner-black' => t('Black')),
    '#group' => 'cuadmin_theme_settings'
  );		
	

$form['cuadmin_theme_settings']['columns'] = array(
		'#type' => 'fieldset', 
		'#title' => t('Column Options'), 
		'#collapsible' => TRUE, 
		'#collapsed' => TRUE,
	);
	
	$form['cuadmin_theme_settings']['columns']['footer_menu_columns'] = array(
	'#type' => 'radios', 
	'#title' => t('Footer Menu Columns'), 
	'#default_value' => theme_get_setting('footer_menu_columns', $theme) ? theme_get_setting('footer_menu_columns', $theme) : '3', 
	'#description' => t('Pick how many columns for footer menu blocks.'),
	'#options' => array('6' => t('6'),'4' => t('4'),'3' => t('3'), '2' => t('2'), '1' => t('1')),
	);
}