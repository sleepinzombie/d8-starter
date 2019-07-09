<?php

namespace Drupal\menus\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class MenuForm.
 */
class MenuForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'menu_form';
  }

  protected function getEditableConfigNames() {
    return ['menus.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('menus.settings');
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('A textfield for storing title.'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#default_value' => $config->get('title'),
    ];
    $form['submit'] = [
      '#type' => 'button',
      '#title' => $this->t('Submit'),
      '#weight' => '0',
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
   * @todo Not working right now, patch this when you have nothing to do.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRebuild();
    $values = $form_state->getValues();

    $this->config('menus.settings')
      ->set('title', $values['title'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}
