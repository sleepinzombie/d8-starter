<?php

namespace Drupal\twigex\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class TwigexController.
 */
class TwigexController extends ControllerBase {

  public $content = 'Hello from the darkside.';

  /**
   * Generate.
   *
   * @return string
   * Return Hello string.
   * 
   * #content is being shared to the template.
   * 
   */
  public function generate() {
    return [
      '#theme' => 'twigex',
      '#content' => $this->t($this->content),
    ];
  }

}
