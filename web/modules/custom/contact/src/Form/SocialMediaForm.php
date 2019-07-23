<?php

namespace Drupal\contact\Form;

use Drupal\Core\Form\FormBase;
use Exception;

/**
 * Class SocialMediaForm.
 */
class SocialMediaForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'social_media_form';
  }

  /**
   * {@inheritdoc}
   *
   * Building the form using a loop to
   * generate multiple fieldsets so as the user can add multiple
   * social media links.
   *
   * NOTE: The length of the index is hardcoded.
   *
   * Moreover, it also loads existing data if available
   * from the Drupal state.
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   * @return void
   */
  public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $existing_values = \Drupal::state()->get('social_media_contents');

    for ($i = 1; $i < 3; $i++) {
      $form['socialmedia' .- $i] = [
        '#type'         =>  'fieldset',
        '#title'        =>  t('Social Media Contents'),
        '#weight'       =>  0,
        '#collapsible'  =>  TRUE,
        '#collapsed'    =>  TRUE,
      ];

      $form['socialmedia' .- $i]['title' .- $i] = [
        '#type'         =>  'textfield',
        '#title'        =>  $this->t('Title'),
        '#maxlength'    =>  64,
        '#size'         =>  64,
        '#weight'       =>  '0',
        '#default_value'=>  isset($existing_values[$i]['title'])
                            ? $existing_values[$i]['title']
                            : NULL,
      ];

      $form['socialmedia' .- $i]['link' .- $i] = [
        '#type'         =>  'textfield',
        '#title'        =>  $this->t('Link'),
        '#maxlength'    =>  64,
        '#size'         =>  64,
        '#weight'       =>  '0',
        '#default_value'=>  isset($existing_values[$i]['link'])
                            ? $existing_values[$i]['link']
                            : NULL,
      ];
    }

    $form['socialmedia']['actions'] = [
      '#type'         =>  'actions',
    ];

    $form['socialmedia']['actions']['submit'] = [
      '#type'         =>  'submit',
      '#value'        =>  t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   *
   * Validation of the forms. Not yet implemented.
   * 
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @todo Add validations to the form if necessary
   */
  public function validateForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   *
   * Submitting the form fetches the value from all the fields
   * and add them to the Drupal state
   *
   * It makes use of a try catch block in case any error occurs.
   *
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   * @return void
   */
  public function submitForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state) {
    for ($i = 1; $i < 3; $i++) {
      $content[$i]['title'] = $form_state->getValue('title' .- $i);
      $content[$i]['link'] = $form_state->getValue('link' .- $i);
    }

    try {
      \Drupal::state()->set('social_media_contents', $content);
      drupal_set_message('Social media contents saved.');
    } catch (Exception $e) {
      throw($e);
    }

  }

}
