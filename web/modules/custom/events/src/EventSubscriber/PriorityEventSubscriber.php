<?php

namespace Drupal\events\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;

use Drupal\Core\Config\ConfigEvents;
use Drupal\Core\Config\ConfigCrudEvent;

class PriorityEventSubscriber implements EventSubscriberInterface {
    public static function getSubscribedEvents() {
        return [
            ConfigEvents::SAVE => ['configSave', 100],
            ConfigEvents::DELETE => ['configDelete', -100]
        ];
    }

    public function configSave(ConfigCrudEvent $event) {
        $config = $event->getConfig();
        drupal_set_message('(Priority) Saved config: ' . $config->getName());
    }

    public function configDelete(ConfigCrudEvent $event) {
        $config = $event->getConfig();
        drupal_set_message('(Priority) Deleted config: ' . $config->getName());

    }
}