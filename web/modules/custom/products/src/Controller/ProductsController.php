<?php

namespace Drupal\products\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ProductsController.
 */
class ProductsController extends ControllerBase {

  /**
   * Generate.
   *
   * @return string
   *   Return Hello string.
   */
  public function generate() {
    kint("The products from VS Code is running");
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: generate')
    ];
  }

}
