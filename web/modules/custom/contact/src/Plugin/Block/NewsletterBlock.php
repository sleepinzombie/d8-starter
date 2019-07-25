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
            '#theme' => 'newsletter',
            '#attached' => [
                'library' => ['contact/newsletter'],
            ],
        ];
    }
}