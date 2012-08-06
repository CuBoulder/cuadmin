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
	

