<?php

namespace Drupal\workwithviews\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class WorkWithViewsController.
 */
class WorkWithViewsController extends ControllerBase {

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
