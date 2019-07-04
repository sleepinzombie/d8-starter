<?php

namespace Drupal\helloworld\access;

use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

class CustomAccessCheck implements AccessInterface {
    public function access(AccountInterface $account) {
        /**
         * Checking if the user permission is vendor.
         * If yes, the route is allowed,
         * If no, the route is forbidden.
         */
        $permission = $account->hasPermission('vendor') ? AccessResult::allowed() : AccessResult::forbidden();
        
        return $permission;
    }
}