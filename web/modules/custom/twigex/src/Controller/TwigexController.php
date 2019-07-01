<?php

namespace Drupal\twigex\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class TwigexController.
 */
class TwigexController extends ControllerBase {

  /**
   * Generate.
   *
   * @return string
   *   Return Hello string.
   */
  public function generate() {
    return [
      '#theme' => 'twigex',
    ];
  }

}
