<?php

namespace Drupal\drushtest\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for drushtest routes.
 */
class DrushtestController extends ControllerBase {

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
