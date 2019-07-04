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
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: generate')
    ];
  }

}
