<?php

namespace Drupal\helloworld\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Class RouteSubscriber.
 *
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    /**
     * The `get` method takes the route machine name (use Devel)
     * to find out.
     * 
     * The `setPath` method takes a destination route which
     * needs to be set up prior to the migration.
     */
     $route = $collection->get('helloworld.content');
     if ($route) {
       $route->setPath('/hello-world');       
     } else {
       print_r('The original route has been migrated to a new one.');
     }
  }
}
