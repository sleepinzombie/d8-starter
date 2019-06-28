<?php

namespace Drupal\snippets\Plugin\Field\SnippetWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldItemListInterface;

class SnippetWidget extends WidgetBase {
    public function formElement(FieldItemListInterface $items, $delta, array $element, array $form, FormStateInterface $form_state)
    {
        $element['source_description'] = array(
            '#title' => $this->t('The Source Description'),
            '#type' => 'textfield',
            '#default_value' => isset($items[$delta]->source_description) ? $items[$delta]->source_description : NULL
        );
        $element['source_code'] = array(
            '#title' => $this->t('The source Code'),
            '#type' => 'textarea',
            '#default_value' => isset($items[$delta]->source_code) ? $items[$delta]->source_code : NULL
        );
        $element['source_lang'] = array(
            '#title' => $this->t('The Source Language'),
            '#type' => 'textfield',
            '#default_value' => isset($items[$delta]->source_lang) ? $items[$delta]->source_lang : NULL
        );
        return $element;
    }
}
