<?php

namespace Drupal\simpleservice;

/**
 * Class SimpleserviceService.
 */
class SimpleserviceService implements SimpleService {

  protected $something;

  /**
   * Constructs a new SimpleserviceService object.
   */
  public function __construct() {
    $this->something = 'Simple hello from the single service';
  }

  /**
   * A simple function that says hello
   * Can take a parameter of string for name,
   * if no name specified, display the default $something text.
   */
  public function sayHello($message = '')
  {
    if(empty($message)) {
      return $this->something;
    } else {
      return 'Hello there, your message is: ' . $message;
    }
  }

  /**
   * A simple function dumping a random
   * message for testing purposes.
   */
  public function dumpSomething()
  {
    dump('Dumping a simple message.');
  }

}
