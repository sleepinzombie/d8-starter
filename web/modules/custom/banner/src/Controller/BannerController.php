<?php

namespace Drupal\banner\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class BannerController.
 */
class BannerController extends ControllerBase {

  /**
   * Generate.
   *
   */
  public function generate() {
    return [
      '#banner_title' => NULL,
      '#banner_description' => NULL,
    ];
  }

}
