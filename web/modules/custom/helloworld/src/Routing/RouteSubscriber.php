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
     * In this case, this part of the code is not working.
     * The `get` method takes the route machine name (use Devel)
     * to find out.
     * 
     * The `setPath` method takes a destination route which
     * needs to be set up prior to the migration.
     */
    if ($route = $collection->get('helloworld.content')) {
      // $route->setPath('/contribute');
    } else {
      // Handle something if the route could not be found.
    }
  }
}
