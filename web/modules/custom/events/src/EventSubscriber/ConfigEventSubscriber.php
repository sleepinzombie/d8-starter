<?php

namespace Drupal\events\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;

use Drupal\Core\Config\ConfigEvents;
use Drupal\Core\Config\ConfigCrudEvent;

/**
 * Class EventSubcriber.
 */
class ConfigEventSubscriber implements EventSubscriberInterface {
    public static function getSubscribedEvents()
    {
        return [
            ConfigEvents::SAVE => 'configSave',
            ConfigEvents::DELETE => 'configDelete',
        ];
    }

    /**
     * React to a config object being saved.
     *
     * @param ConfigCrudEvent $event
     * @return void
     */
    public function configSave(ConfigCrudEvent $event) {
        $config = $event->getConfig();
        drupal_set_message('Saved config: ' . $config->getName());
    }

    /**
     * React to a config object being deleted.
     *
     * @param ConfigCrudEvent $event
     * @return void
     */
    public function configDelete(ConfigCrudEvent $event) {
        $config = $event->getConfig();
        drupal_set_message('Deleted config: ' . $config->getName());
    }
}