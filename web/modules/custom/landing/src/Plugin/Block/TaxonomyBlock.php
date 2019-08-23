<?php

namespace Drupal\landing\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'TaxonomyBlock' block.
 *
 * @Block(
 *  id = "taxonomy_block",
 *  admin_label = @Translation("Taxonomy block"),
 * )
 */
class TaxonomyBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
  	$var['taxonomies'] = \Drupal::service('services.taxonomy_service')->getTaxonomies();
	$var['taxonomies']['labels'] = \Drupal::service('services.taxonomy_service')->get_taxonomy_vocabularies_names();

    return [
	    '#theme' => 'landing_taxonomy',
	    '#var' => $var,
    ];
  }

}
