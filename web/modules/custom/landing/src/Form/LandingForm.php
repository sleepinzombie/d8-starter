<?php

/**
 * @file
 * Contains \Drupal\landing\Form\LandingForm.
 */

namespace Drupal\landing\Form;
use Drupal\Core\Form\FormBase;

class LandingForm extends FormBase {
    public function getFormId()
    {
        return 'landing_form';
    }

    /**
     * Building the form to add landing page content.
     *
     * @param array $form
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     * @return void
     */
    public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
        $form['landing'] = [
            '#type'         =>  'fieldset',
            '#title'        =>  t('Landing Block contents'),
            '#weight'       =>  5,
            '#collapsible'  =>  TRUE,
            '#collapsed'    =>  TRUE,
        ];

        $form['landing']['title'] = [
            '#type'         =>  'textfield',
            '#title'        =>  'Title',
            '#required'     =>  TRUE,
            '#maxlength'    =>  128,
        ];

        $form['landing']['content'] = [
            '#type'         =>  'text_format',
            '#title'        =>  'Content',
            '#required'     =>  TRUE,
        ];

        $form['landing']['actions'] = [
            '#type'         =>  'actions',
        ];

        $form['landing']['actions']['submit'] = [
            '#type'         =>  'submit',
            '#value'        =>  t('Submit'),
        ];

        return $form;
    }

    /**
     * Validation for the landing form.
     *
     * @todo To implement missing validations if necessary
     * @param array $form
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     * @return void
     */
    public function validateForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state) { }

    /**
     * Submitting the landing form. Saving to a Drupal state.
     *
     * @param array $form
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     * @return void
     */
    public function submitForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state) {
        $landing_content['title'] = $form_state->getValue('title');
        $landing_content['content'] = $form_state->getValue('content');

        \Drupal::state()->set('landing_contents', $landing_content);
        drupal_set_message('Landing content has been saved.');
    }
}