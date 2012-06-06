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


function cuadmin_preprocess_block(&$vars) {
  if (theme_get_setting('footer_menu_columns')) {
    $footer_menu_columns = theme_get_setting('footer_menu_columns');
  }
  else {
    $after_content_columns = 1;
  }
  
  $block_counter = &drupal_static(__FUNCTION__, array());
  $vars['block'] = $vars['elements']['#block'];
  // All blocks get an independent counter for each region.
  if (!isset($block_counter[$vars['block']->region])) {
    $block_counter[$vars['block']->region] = -1;
  }

  switch ($vars['block']->region) {
    case 'footer_menus':
      $vars['classes_array'][] = 'grid-' . 12/$footer_menu_columns;
      $vars['classes_array'][] = ($block_counter[$vars['block']->region] % ($footer_menu_columns)) ? '' : 'new-block-row';
      $vars['mycounter'] = $block_counter[$vars['block']->region];
      break;
    }
}
