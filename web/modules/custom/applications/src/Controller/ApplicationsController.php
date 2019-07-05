<?php

namespace Drupal\applications\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ApplicationsController.
 */
class ApplicationsController extends ControllerBase {

  /**
   * Generate.
   *
   * @return string
   *   Return Hello string.
   */
  public function generate() {
    return [
      '#theme' => 'applications',
    ];
  }

}
