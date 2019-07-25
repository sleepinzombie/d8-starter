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
   * {@inheritDoc}
   *
   * Building the block by specifying
   * the theme and variables if there are any.
   *
   * As well any libraries that is concerned with this block.
   * @return void
   */
  public function build() {
    return [
      '#theme' => 'socialmedia',
      '#contents' => \Drupal::state()->get('social_media_contents'),
      '#attached' => [
        'library' => ['contact/socialmedia'],
      ],
    ];
  }

}
