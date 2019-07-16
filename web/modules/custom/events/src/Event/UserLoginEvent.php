<?php

namespace Drupal\events\Event;

use Drupal\user\UserInterface;
use Symfony\Component\EventDispatcher\Event;

class UserLoginEvent extends Event {
    /**
     * Our own new custom event
     */
    // const EVENT_NAME = 'custom_user_login_event';

    // /**
    //  * Account variable
    //  *
    //  * @var UserInterface $account
    //  */
    // public $account;

    // public function __construct(UserInterface $account) {
    //     $this->account = $account;
    // }
}
