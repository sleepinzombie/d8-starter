<?php

namespace Drupal\contact\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'NewsletterBlock' block.
 *
 * @Block(
 *  id = "newsletter_block",
 *  admin_label = @Translation("Newsletter block"),
 * )
 */
class NewsletterBlock extends BlockBase {

    public function build() {
        return [
            '#theme' => 'newsletter',
        ];
    }
}