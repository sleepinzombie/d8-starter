<?php

namespace Drupal\twigex\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class TwigexController.
 */
class TwigexController extends ControllerBase {

  public $content = 'Hello from the darkside.';

  /**
   * Hardcodes array to check if
   * array can be sent to template and use Twig
   * to display to user.
   */
  public $technologies = array(
    array('Angular', 'http://angular.io'),
    array('React', 'http://reactjs.com'),
    array('Google Cloud Platform', 'http://googlecloud.com'),
    array('Vuejs', 'http://vuejs.com'),
  );

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
      '#techno' => $this->technologies,
    ];
  }

}
