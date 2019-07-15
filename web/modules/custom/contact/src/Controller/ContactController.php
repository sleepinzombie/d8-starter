<?php

namespace Drupal\contact\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ContactController.
 */
class ContactController extends ControllerBase {

  /**
   * Generate.
   *
   * Generate the page.
   *
   */
  public function generate() {
    return [
      '#field_title' => NULL,
      '#field_content' => NULL,
      '#image' => NULL,
    ];
  }

}
