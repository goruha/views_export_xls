<?php

/**
 * @file views-export-xls-view-xls.tpl.php
 * Template to display a view as an xls file.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $rows: An array of row items. Each row is an array of content
 *   keyed by field ID.
 * - $header: an array of haeaders(labels) for fields.
 * - $themed_rows: a array of rows with themed fields.
 * @ingroup views_templates
 */

  if (!isset($filename) || empty($filename)) {
    $filename = $view->name . '.xls';
  }
  $filepath = drupal_tempnam("temporary://", $filename);

  $http_headers = array(
    'Content-Type' => 'application/vnd.ms-excel',
    'Content-Disposition' => "inline; filename=\"$filename\"",
  );

  module_load_include('inc', 'phpexcel');
  if (PHPEXCEL_SUCCESS == phpexcel_export($header, $themed_rows, $filepath)) {
    file_transfer($filepath, $http_headers);
  }
  drupal_not_found();
