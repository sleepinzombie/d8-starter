<?php

namespace Drupal\services;

use \Drupal\file\Entity\File;

/**
 * Class ImageFileService.
 */
class ImageFileService {

  /**
   * Constructs a new ImageFileService object.
   */
  public function __construct() { }

  /**
   * Saving an image to the file.usage Drupal service.
   *
   * @param mixed $image_fid The unique fid of the image referenced
   * @param string $module The name of the module using this file
   * @param string $type The type of the module
   * @see https://api.drupal.org/api/drupal/core%21modules%21file%21src%21FileUsage%21FileUsageInterface.php/interface/FileUsageInterface/8.2.x
   * @return void
   */
  public function addImage($image_fid, $module, $type) {
    $image_file = File::load($image_fid[0]);
    if (!empty($image_file)) {
      $image_file->setPermanent();
      $image_file->save();
      $file_usage = \Drupal::service('file.usage');
      $file_usage->add($image_file, $module, $type, intval($image_fid[0]));
    } else {
      drupal_set_message(t('An error occured while uploading the image.'), 'error');
    }
  }
}
