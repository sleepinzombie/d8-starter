<?php

namespace Drupal\menus\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class MenusController.
 */
class MenusController extends ControllerBase {
  

  public function generate() {
    return [
      '#theme' => 'menus'
    ];
  }

  public function initMenu() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('This is the menu settings page.')
    ];
  }

  public function initThirdParty() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('This is the third party settings page.')
    ];
  }

}
