<?php

namespace Drupal\secondmodblock\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'VisitUs' block.
 *
 * @Block(
 *  id = "visit_us",
 *  admin_label = @Translation("Visit us"),
 * )
 */
class VisitUs extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['visit_us']['#theme'] = 'secondmodblock';

    return $build;
  }

}
