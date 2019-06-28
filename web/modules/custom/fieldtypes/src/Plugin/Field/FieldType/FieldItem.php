<?php

namespace Drupal\fieldtypes\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'fieldtypes' field type.
 *
 * @FieldType(
 *   id = "snippets_code",
 *   label = @Translation("Snippets field"),
 *   description = @Translation("This field stores code snippets in the database."),
 *   default_widget = "snippets_default",
 *   default_formatter = "snippets_default"
 * )
 */

class FieldItem extends FieldItemBase {
    /**
     * Implements hook_schema().
     */
    public static function schema(FieldStorageDefinitionInterface $field) {
        return array(
            'columns' => array(
              'source_description' => array(
                'type' => 'varchar',
                'length' => 256,
                'not null' => FALSE,
              ),
              'source_code' => array(
                'type' => 'text',
                'size' => 'big',
                'not null' => FALSE,
              ),
              'source_lang' => array(
                'type' => 'varchar',
                'length' => 256,
                'not null' => FALSE,
              ),
            ),
        );
    }

    public function isEmpty() {
        $value = $this->get('source_code')->getValue();
        return $value === NULL || $value = '';
    }

    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties['source_description'] = DataDefinition::create('string')->setLabel(t('Source Descrption'));
        $properties['source_code'] = DataDefinition::create('string')->setLabel(t('Source Code'));
        $properties['source_lang'] = DataDefinition::create('string')->setLabel(t('Source Language'));
        return $properties;
    }
    
}