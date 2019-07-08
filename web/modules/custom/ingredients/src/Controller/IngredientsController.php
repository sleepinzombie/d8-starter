<?php

namespace Drupal\ingredients\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class IngredientsController.
 */
class IngredientsController extends ControllerBase {

  private $ingredientsGenerator;

  /**
   * Creating a container with the factory method.
   */
  public static function create(ContainerInterface $container) {
    $ingredientsGenerator = $container->get('simpleservice.hello');
    return new static($ingredientsGenerator);
  }

  /**
   * Creating an instance of the service.
   */
  public function __construct($ingredientsGenerator) {
    $this->ingredientsGenerator = $ingredientsGenerator;
  }

  /**
   * Simple function trying out Entity Type Manager.
   */
  public function getEntityTypeMgr() {
    $storage = \Drupal::entityTypeManager()->getStorage('user_role');
    dump($storage);
  }

  /**
   * Simple function trying out Entity Query.
   */
  public function getEntityQuery() {
    $query = \Drupal::entityQuery('user_role');
    dump($query);
  }

  /**
   * This function simply retrieves data from
   * the `node_field_data` from Drupal database.
   */
  public function retrieveNodes() {
    $connection = \Drupal::database();
    $query = "SELECT title FROM node_field_data";
    $result = $connection->query($query);
    if ($result) {
      while($row = $result->fetchAssoc()) {
        dump($row['title']);
      }
    }
  }

  /**
   * Generate.
   *
   * @return string
   *   Return Hello string.
   */
  public function generate() {
    //$simpleservice = \Drupal::service('simpleservice.hello');
    return [
      '#theme' => 'ingredients',
      //'#messagevar' => $simpleservice->sayHello("Ingredients calling the service."), // This one is for using the global $simpleservice
      '#messagevar' => $this->ingredientsGenerator->sayHello("Hello from the dependency injection..."), // This one is using Dependency Injection and container
      // '#dumpvar' => $simpleservice->dumpSomething(),
    ];
  }

}
