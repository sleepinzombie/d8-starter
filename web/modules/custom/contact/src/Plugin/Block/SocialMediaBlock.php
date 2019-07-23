<?php

namespace Drupal\contact\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'SocialMediaBlock' block.
 *
 * @Block(
 *  id = "social_media_block",
 *  admin_label = @Translation("Social media block"),
 * )
 */
class SocialMediaBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'socialmedia',
      '#content' => \Drupal::state()->get('social_media_contents'),
    ];
  }

}
