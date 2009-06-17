<?php
// $Id$
/**
 * @file
 * Views include file with views hooks.
 */

/**
 * Implementation of hook_views_plugins().
 */
function views_export_xls_views_plugins() {
  $path = drupal_get_path('module', 'views_export_xls');
  return array(
    'style' => array(
      'xls' => array(
        'title' => t('XLS file'),
        'help' => t('Display the view as excel file.'),
        'path' => $path,
        'handler' => 'views_export_xls_style',
        'parent' => 'views_bonus_export',
        'theme' => 'views_export_xls_file',
        'uses row plugin' => FALSE,
        'uses fields' => TRUE,
        'uses options' => TRUE,
        'type' => 'feed',
      ),
    ),
  );
}

