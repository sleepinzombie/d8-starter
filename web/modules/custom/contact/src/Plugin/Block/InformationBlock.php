<?php

namespace Drupal\contact\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\file\Entity\File;

/**
 * Provides a 'InformationBlock' block.
 *
 * @Block(
 *  id = "information_block",
 *  admin_label = @Translation("Information block"),
 * )
 */
class InformationBlock extends BlockBase {

  /**
   * {@inheritdoc}
   * On init, it fetches the values from the
   * state and displays to the template.
   *
   */
  public function build() {
    return [
      '#theme' => 'contact',
      '#field_title' => $this->retrieveStateValues()['title'],
      '#field_content' => $this->retrieveStateValues()['content'],
      '#image' => $this->loadImage(intval($this->retrieveStateValues()['image'][0])),
    ];
  }

  /**
   * A custom method to simply fetch the
   * values from the state (using key/value pairs).
   *
   * @return array Array of the retrieved values.
   */
  public function retrieveStateValues() {
    $keys = ['title', 'content', 'image'];
    $retrieved_values = \Drupal::state()->getMultiple($keys);
    return $retrieved_values;
  }

  /**
   * Function to obtain a stored image uri and
   * the filename of the image from the Drupal database using its fid.
   *
   * @param integer $image_fid The fid of the image you want to use.
   * @return array The uri path and the filename of the image.
   */
  public function loadImage($image_fid) {
    $file = File::load($image_fid);
    $path = $file->getFileUri();
    $filename = $file->getFilename();
    return [
      'path' => $path,
      'filename' => $filename,
    ];
  }
}
