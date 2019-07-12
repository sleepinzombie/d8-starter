<?php

namespace Drupal\contact\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ContactController.
 */
class ContactController extends ControllerBase {

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

  public function loadForm() {
    return [
      '#theme' => 'contact'
    ];
  }

}
