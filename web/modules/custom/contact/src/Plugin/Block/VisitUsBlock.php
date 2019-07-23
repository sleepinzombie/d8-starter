<?php

namespace Drupal\contact\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'VisitUsBlock' block.
 *
 * @Block(
 *  id = "visit_us_block",
 *  admin_label = @Translation("Visit Us Block"),
 * )
 */
class VisitUsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'visitus',
    ];
  }

}
