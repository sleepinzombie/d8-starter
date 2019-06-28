<?php

namespace Drupal\snippets\Plugin\Field\SnippetItem;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

class SnippetItem extends FieldItemBase {
    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {
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

    public function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties['source_description'] = DataDefinition::create('string')->setLabel(t('Source Descrption'));
        $properties['source_code'] = DataDefinition::create('string')->setLabel(t('Source Code'));
        $properties['source_lang'] = DataDefinition::create('string')->setLabel(t('Source Language'));
        return $properties;
    }
}