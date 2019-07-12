<?php

namespace Drupal\events\EventSubscriber;

use Drupal\events\Event\UserLoginEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserLoginSubscriber implements EventSubscriberInterface {

    /**
     * Database object.
     *
     * @var \Drupal\Core\Database\Connection
     */
    protected $database;

    /**
     * Formatting the date after retrieving from db.
     *
     * @var Drupal\Core\Datetime\DateFormatter
     */
    protected $dateFormatter;

    public static function getSubscribedEvents() {
        return [
            UserLoginEvent::EVENT_NAME => 'onUserLogin',
        ];
    }

    /**
     * React to the user event login dispatched.
     *
     * A new user will create an accout and his/her data
     * will be fetched from the db using a SQL Query.
     *
     * Drupal message would be set after successful retrieval of
     * the user account.
     *
     * @param UserLoginEvent $event
     * @return void
     */
    public function onUserLogin(UserLoginEvent $event) {
        $database = \Drupal::database();
        $dateFormatter = \Drupal::service('date.formatter');

        $account_created = $database->select('users_field_data', 'ud')
            ->fields('ud', ['created'])
            ->condition('ud.uid', $event->account->id())
            ->execute()
            ->fetchField();

        drupal_set_message('Your account was successfully created on: %created_data', ['%created_date' => $dateFormatter->format($account_created, 'short')]);
    }
}