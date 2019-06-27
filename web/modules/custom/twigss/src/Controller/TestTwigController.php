<?php

namespace Drupal\twigss\Controller;
 
use Drupal\Core\Controller\ControllerBase;

class TestTwigController extends ControllerBase {
    public function content() {
        return [
            '#theme' => 'custom_template',
            '#test_var' => $this->t('This is a simple test value hahaha hoho'),
        ];
    }
}

