<?php

namespace Drupal\cssinwork\Controller;

use Drupal\Core\Controller\ControllerBase;

class CssinworkController extends ControllerBase {
    public function content() {
        return [
            '#theme' => 'blissy',
            '#attached' => [
              
            ]
        ];
    }
}