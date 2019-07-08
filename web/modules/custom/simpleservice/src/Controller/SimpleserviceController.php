<?php

namespace Drupal\simpleservice\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class SimpleserviceController.
 */
class SimpleserviceController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello')
    ];
  }

}
