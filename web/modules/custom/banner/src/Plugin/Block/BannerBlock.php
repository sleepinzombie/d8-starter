<?php

namespace Drupal\banner\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'BannerBlock' block.
 *
 * @Block(
 *  id = "banner_block",
 *  admin_label = @Translation("Banner Block"),
 * )
 */
class BannerBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'banner',
      '#banner_title' => NULL,
      '#banner_description' => 'This description should have been dynamic but it is not.',
    ];
  }

}
