<?php

namespace Drupal\drushtest\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use PHPUnit\Framework\Constraint\Exception;

/**
 * Configure drushtest settings for this site.
 *
 * This is the default class that comes with when generating a
 * Drupal 8 Module alongside a Form as option.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drushtest_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['drushtest.settings'];
  }

  /**
   * {@inheritdoc}
   *
   * Building the form here and setting the default values
   * from `drushtest.settings` configuration file.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['example'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Example'),
      '#default_value' => $this->config('drushtest.settings')->get('example'), // Retrieving existing value using the key
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Fetching the form value using the field key. `example` is the key here in this case.
    // Checking if the form field is null, and if yes, send an error message.
    if ($form_state->getValue('example') == NULL) {
      $form_state->setErrorByName('example', $this->t('The field(s) cannot be empty.'));
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      // Setting the value from the form to the configuration file settings.
      // Save the form and submit it.
      $this->config('drushtest.settings')
        ->set('example', $form_state->getValue('example'))
        ->save();
      parent::submitForm($form, $form_state);
    } catch (Exception $ex) {
      drupal_set_message('There was an error in submitting this form. Take a look at the exception' . $ex);
    };
  }

}
