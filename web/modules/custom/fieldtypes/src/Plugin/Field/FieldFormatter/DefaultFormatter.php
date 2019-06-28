<?php

// Drupal\MODULE_NAME\Plugin\Field\FieldType
namespace Drupal\fieldtypes\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

class DefaultFormatter extends FormatterBase {
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