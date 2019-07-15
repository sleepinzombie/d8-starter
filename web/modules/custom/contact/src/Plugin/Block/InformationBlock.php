<?php

namespace Drupal\contact\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'InformationBlock' block.
 *
 * @Block(
 *  id = "information_block",
 *  admin_label = @Translation("Information block"),
 * )
 */
class InformationBlock extends BlockBase {

  /**
   * {@inheritdoc}
   * On init, it fetches the values from the
   * state and displays to the template.
   *
   */
  public function build() {
    return [
      '#theme' => 'contact',
      '#field_title' => $this->retrieveStateValues()['title'],
      '#field_content' => $this->retrieveStateValues()['content'],
    ];
  }

  /**
   * A custom method to simply fetch the
   * values from the state (using key/value pairs).
   *
   * @return array Array of the retrieved values.
   */
  public function retrieveStateValues() {
    $keys = ['title', 'content'];
    $retrieved_values = \Drupal::state()->getMultiple($keys);
    return $retrieved_values;
  }

}
