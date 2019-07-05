<?php

namespace Drupal\workwithviews\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'WorkWithViewsBlock' block.
 *
 * @Block(
 *  id = "work_with_views_block",
 *  admin_label = @Translation("Work with views block"),
 * )
 */
class WorkWithViewsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#theme' => 'block--workwithviews',
    );
  }

}
