<?php

namespace Drupal\enumbers\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ENumbersController.
 */
class ENumbersController extends ControllerBase {

  /**
   * Generate.
   *
   * @return string
   *   Return Hello string.
   */
  public function generate() {
    return [
      '#theme' => 'enumbers',
    ];
  }

}
