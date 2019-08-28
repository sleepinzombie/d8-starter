<?php

namespace Drupal\services;

use Drupal\taxonomy\Entity\Vocabulary;

/**
 * Class TaxonomyService.
 */
class TaxonomyService {

	/**
	 * Get a specific taxonomy using the vocabulary id.
	 * 
	 * @param  string $term_id The vid of the taxonomy
	 * @return array The terms fetched
	 */
	public static function getTaxonomy($term_id) {
		$taxonomies = \Drupal::entityManager()->getStorage('taxonomy_term')->loadTree($term_id);
		if (!empty($taxonomies)) {
			foreach($taxonomies as $taxonomy) {
				$terms[] = [
					'tid' => $taxonomy->tid,
					'name' => $taxonomy->name,
				];
			};
			return $terms;
		}
	}

	/**
	 * Getting all taxonomies.
	 * Sorted by tid.
	 * 
	 * @return array The list of taxonomies fetched
	 */
	public function getTaxonomies() {
		$names = array_keys(taxonomy_vocabulary_get_names());
		$taxonomies = [];
		foreach($names as $name) {
			$terms = $this->getTaxonomy($name);
			if (!is_null($terms)) {
				foreach($terms as $taxonomy) {
					array_push($taxonomies, $taxonomy);
				};
				sort($taxonomies);
			};
		};
		return $taxonomies;
	}

	/**
	 * Getting all taxonomies vocabularies titles
	 * @return array List of taxonomy vocabularies
	 */
	public function get_taxonomy_vocabularies_names() {
		$vocabularies = Vocabulary::loadMultiple();
		kint($vocabularies);
		$vocabularies_names = [];
		foreach ($vocabularies as $vocabulary) {
			array_push($vocabularies_names, $vocabulary->label());
		}
		return $vocabularies_names;
	}
}