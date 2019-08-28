<?php

namespace Drupal\aboutus\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class AboutUsController.
 */
class AboutUsController extends ControllerBase {

  /**
   * Content.
   *
   * @return string
   *   Return Hello string.
   */
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: content')
    ];
  }

}
