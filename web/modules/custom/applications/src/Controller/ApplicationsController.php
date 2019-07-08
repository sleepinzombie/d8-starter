<?php

namespace Drupal\applications\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ApplicationsController.
 */
class ApplicationsController extends ControllerBase {

  /**
   * Generate.
   * 
   * Sending a simple variable from the Simpleservice
   * to the Applications twig template file. (#var is the variable)
   *
   * @return string
   * Return Hello string.
   */
  public function generate() {
    $service = \Drupal::service('simpleservice.hello');
   // dump($service->sayHello("I'm a robot!"));
    return [
      '#theme' => 'applications',
      '#var' => $service->sayHello("I'm a robot sending you this message from a service!"),
    ];
  }

}
