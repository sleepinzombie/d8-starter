<?php

namespace Drupal\landing\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides an example block.
 *
 * @Block(
 *   id = "landing_example",
 *   admin_label = @Translation("Example"),
 *   category = @Translation("landing")
 * )
 */
class LandingBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'landing',
      '#content' => \Drupal::state()->get('landing_contents'),
    ];
  }

}