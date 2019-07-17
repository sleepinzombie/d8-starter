<?php

namespace Drupal\dtest\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for dtest routes.
 */
class DtestController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#theme' => 'dtest',
      '#somevar' => 'Hello',
    ];

    return $build;
  }

}
