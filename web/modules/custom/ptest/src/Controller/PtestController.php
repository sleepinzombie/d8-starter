<?php

namespace Drupal\ptest\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for ptest routes.
 */
class PtestController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#theme' => 'page__ptest__example',
      '#somevar' => 'Something var',
    ];

    return $build;
  }

}
