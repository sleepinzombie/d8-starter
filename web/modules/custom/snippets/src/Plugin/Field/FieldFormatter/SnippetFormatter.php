<?php

/**
 * Namespace is in the format like below:
 * 
 * Drupal\MODULE_NAME\Plugin\Field\FieldType
 */

namespace Drupal\snippets\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

class SnippetFormatter extends FormatterBase {
    public function viewElements(FieldItemListInterface $items)
    {
        $elements = array();
        foreach ($items as $index => $item) {
            $source = array(
                '#source_description' => $item->source_description,
                '#source_code'=> $item->source_code,
            );

            $elements[$index] = array('#markup' => drupal_render($source));
        }
        return $elements;
    }
}