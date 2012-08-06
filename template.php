<?php

/**
 * Implements hook_preprocess_html().
 */
function cuadmin_preprocess_html(&$vars) {
  // Remove show-grid class.
  unset($vars['classes_array'][array_search('show-grid', $vars['classes_array'])]);

  // Add CSS for logo background.
  $logo = theme_get_setting('logo');
  $logo_css = "#branding h1 a, #branding #logo a { background-image:url(" . check_url($logo) . "); }";
  $options = array(
    'type' => 'inline',
    'group' => CSS_THEME,
	);
  drupal_add_css($logo_css , $options);

  $banner_color = theme_get_setting('banner_color');
  $vars['classes_array'][]=$banner_color;
  
  // Add fonts.
  $font_set = theme_get_setting('fonts');
  $font_path = drupal_get_path('theme','cu_bootstrap');
  if ($font_set) {
    drupal_add_css($font_path .'/fonts/' . $font_set . '.css', array('group' => CSS_THEME, 'every_page' => TRUE));
  }
}


