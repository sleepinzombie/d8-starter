<?php

namespace Drupal\ingredients\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class IngredientsController.
 */
class IngredientsController extends ControllerBase {

  /**
   * Generate.
   *
   * @return string
   *   Return Hello string.
   */
  public function generate() {
    return [
      '#theme' => 'ingredients',
    ];
  }

}
