<?php

namespace Drupal\landing\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'LandingBottom' block.
 *
 * @Block(
 *  id = "landing_bottom",
 *  admin_label = @Translation("Landing Bottom"),
 * )
 */
class LandingBottom extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'landing_bottom',
      '#content_types' => $this->fetchContentTypes(),
    ];
  }

  /**
   * Fetching of all content types from backoffice.
   *
   * @return void
   */
  public function fetchContentTypes() {
    $content_types_array = [];
    $content_types = \Drupal\node\Entity\NodeType::loadMultiple();
    foreach ($content_types as $content_type) {
      $content_types_array[$content_type->id()] = $content_type->label();
    }

    return $content_types_array;
  }


}
