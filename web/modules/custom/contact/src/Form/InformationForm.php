<?php

namespace Drupal\contact\Form;

use Drupal\file\Entity\File;
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
      '#required'=> TRUE,
    ];
    $form['content'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Content'),
      '#weight' => '0',
      '#default_value' => $state_values['content'],
    ];
    $form['image'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Image Reference'),
      '#upload_validators' => [
        'file_validate_extensions' => array('gif png jpg jpeg'),
        'file_validate_size' => array(25600000),
      '#preview_image_style' => 'medium',
      '#upload_location' => 'public://profile-pictures', // Might need to change this url
      ]
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
   * @todo NEED TO WORK ON THIS TOMORROW FIX THE ERRORS`
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $title = $form_state->getValue('title');
    $content = $form_state->getValue('content');
    $image_fid = $form_state->getValue('image');

    $image_file = File::load($image_fid[0]);
    if (!empty($image_file)) {
      $image_file->setPermanent();
      $image_file->save();
      $file_usage = \Drupal::service('file.usage');
      $file_usage->add($image_file, 'contact', 'block', $image_fid);
    } else {
      ksm("It is empty here oh oh");
    }

    // $state_form_variables = [
    //   'title' => $title,
    //   'content' => $content,
    //   'image' => $image_fid,
    // ];

    // \Drupal::state()->setMultiple($state_form_variables);
    // \Drupal::messenger()->addMessage('Your content has been saved to the Drupal state.');
  }

}
