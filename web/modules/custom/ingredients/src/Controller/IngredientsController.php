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
    $simpleservice = \Drupal::service('simpleservice.hello');
    return [
      '#theme' => 'ingredients',
      '#messagevar' => $simpleservice->sayHello("Ingredients calling the service."),
      // '#dumpvar' => $simpleservice->dumpSomething(),
    ];
  }

}
