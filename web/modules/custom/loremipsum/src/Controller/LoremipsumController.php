<?php

namespace Drupal\loremipsum\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Loremipsum routes.
 */
class LoremipsumController extends ControllerBase {
  
  /**
   * Constructs Lorem ipsum text with arguments.
   * This callback is mapped to the path
   * 'loremipsum/generate/{paragraphs}/{phrases}'.
   * 
   * @param string $paragraphs
   *   The amount of paragraphs that need to be generated.
   * @param string $phrases
   *   The maximum amount of phrases that can be generated inside a paragraph.
   */
  public function generate($paragraphs, $phrases) {
    $config = Drupal::config('loremipsum.settings');
    $page_title = $config->get('loremipsum.page_title');
    $source_text = $config->get('loremipsum.source_text');

    $repertory = explode(PHP_EOL, $source_text);
    print_r($repertory);

    $element['#source_text'] = array();
    for ($i = 1; $i <= $paragraphs; $i++) {
      $this_paragraph = '';
      $random_phrases = mt_rand(round($phrases / 2), $phrases);
      $last_number = 0;
      $next_number = 0;
      for ($j = 1; $j <= $random_phrases; $j++) {
        do {
          $next_number = floor(mt_rand(0, count($repertory) - 1));
        } while ($next_number === $last_number && count($repertory) > 1);
        $this_paragraph .= $repertory[$next_number] . ' ';
        $last_number = $next_number;
      }
        /**
         * Returning the modified source text value as well as
         * the title value.
         * Plus setting the theme function.
         * Finally returning the element.
         */
        $element['#source_text'][] = Html::escape($this_paragraph);
        $element['#title'] = Html::escape($page_title);
        $element['#theme'] = 'loremipsum';
        return $element;
    }
  }
}
