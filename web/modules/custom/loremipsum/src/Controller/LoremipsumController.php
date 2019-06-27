<?php

namespace Drupal\loremipsum\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Loremipsum routes.
 */
class LoremipsumController extends ControllerBase {

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
