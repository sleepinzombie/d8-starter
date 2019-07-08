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
  public function simpleStaticQuery() {
    $connection = \Drupal::database();
    $sql = "SELECT * FROM node_field_data";
    $result = $connection->query($sql);
    if ($result) {
      while($row = $result->fetchAssoc()) {
        # Do something with the data fetched;
      }
    } else {
      print_r("There is no data in the table.");
    }
  }

  /**
   * This function retrieves data from
   * the `node_field_data` from Drupal database
   * using a WHERE condition.
   */
  public function queryWithWhere() {
    $connection = \Drupal::database();
    $sql = "SELECT title FROM node_field_data WHERE type = :type";
    $result = $connection->query($sql, [':type' => 'page']);
    if ($result) {
      while($row = $result->fetchAssoc()) {
        dump($row['title']);
      }
    } else {
      print_r("There is no data in this table.");
    }
  }

  public function firstDynamicQuery() {
    $connection = \Drupal::database();
    $query = $connection
          ->select('node_field_data', 'nfd')
          ->fields('nfd', ['title']); // if array is empty, the query will be: SELECT * ..
    $result = $query->execute();
    if($result) {
      while($row = $result->fetchAssoc()) {
        dump($row['title']);
      }
    } else {
      print_r("There is no data in this table.");
    }
  }

  /**
   * Trying out the count query
   * Count query is retrieving the
   * number of items that a particular table contains.
   */
  public function countQuery() {
    $connection = \Drupal::database();
    $query = $connection->select('node_field_data', 'nfd')->fields('nfd', ['title']);
    $num_rows = $query->countQuery()->execute()->fetchAll();
    dump($num_rows);
  }

  /**
   * Fetching only a row from the query
   * using the index of the array.
   */
  public function fetchOnlyOneField() {
    $connection = \Drupal::database();
    $query = $connection->select('node_field_data', 'nfd')->fields('nfd', ['title']);
    $num_rows = $query->execute()->fetchField(0);
    dump($num_rows);
  }

  /**
   * A simple example of working with Database Insert.
   * Not working currently because there are too much fields
   * that need to be specified.
   */
  public function insertNewData() {
    $connection = \Drupal::database();
    $result = $connection->insert('node_field_data')
      ->fields([
        'title' => 'Doritos',
        'nid' => 11,
        'vid' => 18,
        'langcode' => 'en',
        'status' => 1,
        'uid' => 1,
        'type' => 'ingredients',
        'created' => REQUEST_TIME,
        'changed' => REQUEST_TIME,
      ])
      ->execute();
  }

  /**
   * Function to update a field.
   * Currently hardcoded, ran once removing from
   * auto init.
   */
  public function updateExisting() {
    $connection = \Drupal::database();
    $update = $connection->update('node_field_data')
      ->fields([
        'title' => 'Coffees'
      ])
      ->condition('nid', 9, '=')
      ->execute();
  }

  /**
   * Function to try out merged queries.
   * Don't attempt to run again, will receive error due to the fact
   * that the `title` field has already been changed.
   * 
   * Update the value of the title to a new one and try again.
   */
  public function performMergeQuery() {
    $connection = \Drupal::database();
    $connection->merge('node_field_data')
      ->key('title', 'Merged Test0')
      ->fields([
        'title' => 'Merged Test'
      ])
      ->execute();
  }

  /**
   * Function to try out delete query.
   * Harcoded function, will receive error if the
   * nid 12 does not exist. Don't run on init.
   */
  public function deleteQuery() {
    $connection = \Drupal::database();
    $query = $connection->delete('node_field_data')
      ->condition('nid', 12)
      ->execute();
  }

  /**
   * Generate.
   *
   * @return string
   *   Return Hello string.
   */
  public function generate() {
    //$simpleservice = \Drupal::service('simpleservice.hello');
    // Any on init code goes here..
    return [
      '#theme' => 'ingredients',
      //'#messagevar' => $simpleservice->sayHello("Ingredients calling the service."), // This one is for using the global $simpleservice
      '#messagevar' => $this->ingredientsGenerator->sayHello("Hello from the dependency injection..."), // This one is using Dependency Injection and container
      // '#dumpvar' => $simpleservice->dumpSomething(),
    ];
  }

}
