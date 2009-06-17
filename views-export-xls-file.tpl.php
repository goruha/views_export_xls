<?php
// $Id$
/**
 * @file views-export-xls-file.tpl.php
 * Template to display a view as an xls file.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $rows: An array of row items. Each row is an array of content
 *   keyed by field ID.
 * - $header: an array of haeaders(labels) for fields.
 * - $themed_rows: a array of rows with themed fields.
 * @ingroup views_templates
 */
  require_once('./' . drupal_get_path('module', 'views_export_xls') . '/ExcelExport.class.php');

  $xls = new ExcelExport();
  //add hearder
  $xls->addRow(array_values($header));
  //add rows
  foreach ($themed_rows as $count => $row) {
    $xls->addRow(array_values($row));
  }
  
  $xls->output();

?>
