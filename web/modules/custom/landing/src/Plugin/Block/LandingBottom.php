<?php

namespace Drupal\landing\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'LandingBottom' block.
 *
 * @Block(
 *  id = "landing_bottom",
 *  admin_label = @Translation("Landing bottom"),
 * )
 */
class LandingBottom extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'landing_bottom',
    ];
  }

}
