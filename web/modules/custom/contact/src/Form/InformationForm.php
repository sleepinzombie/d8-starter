<?php

namespace Drupal\contact\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class InformationForm.
 */
class InformationForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'information_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $state_values = \Drupal::state()->getMultiple(['title', 'content']);

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#default_value' => $state_values['title'],
    ];
    $form['content'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Content'),
      '#weight' => '0',
      '#default_value' => $state_values['content'],
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $title = $form_state->getValue('title');
    $content = $form_state->getValue('content');

    $state_form_variables = [
      'title' => $title,
      'content' => $content,
    ];

    \Drupal::state()->setMultiple($state_form_variables);
    \Drupal::messenger()->addMessage('Your content has been saved to the Drupal state.');
  }

}
