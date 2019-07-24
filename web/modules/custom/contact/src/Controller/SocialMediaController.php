<?php

namespace Drupal\contact\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class SocialMediaController.
 */
class SocialMediaController extends ControllerBase {

  /**
   * Generate.
   *
   * Generate the page.
   *
   */
  public function generate() {
    return [
      '#contents' => NULL,
    ];
  }

}
