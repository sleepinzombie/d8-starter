<?php

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class LoremIpsumForm extends ConfigFormBase {
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form = parent::buildForm($form, $form_state);
        $config = $this->config('loremipsum.settings');

        // Building the form
        // Page Title field
        $form['page_title'] = array(
            '#type'     =>  'textfield',
            '#title'    =>  $this->t('Lorem ipsum generator page title'),
            '#default_value' => $config->get('loremipsum.page_title'),
            '#description' => $this->t('Give your generator page title a description'),
        );

        // Source Text field
        $form['source_text'] = array(
            '#type' => 'textarea',
            '#title' => $this->t('Lorem ipsum generator source text'),
            '#default_value' => $config->get('loremipsum.source_text'),
            '#description' => $this->t('Give your generator source text a description'),
        );
        return $form;
    }

    public function submitForm(array $form, FormStateInterface $form_state) {
        $config = $this->config('loremipsum.settings'); // Fetching settings
        // Setting the page title in settings from the value of the form
        $config->set('loremipsum.page_title', $form_state->getValue('page_title'));
        // Setting the source text in settings from the value of the form
        $config->set('loremipsum.source_text'. $form_state->getValue('source_text'));
        $config->save(); // Saving the config
        return parent::submitForm($form, $form_state); // Submitting the form
    }

    public function validateForm(array $form, FormStateInterface $form_state) { }

    public function getEditableConfigNames() {
        return ['loremipsum.settings'];
    }

    
}