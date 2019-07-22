<?php

namespace Drupal\landing\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for landing routes.
 */
class LandingController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
