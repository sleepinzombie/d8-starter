<?php

namespace Drupal\landing\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for landing routes.
 */
class LandingController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {
    return [
      '#content' => NULL,
    ];
  }

}
