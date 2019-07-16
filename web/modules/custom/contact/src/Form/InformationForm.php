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
      ],
      '#preview_image_style' => 'medium',
      '#upload_location' => 'public://contact_content/',
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
   * Submitting the form.
   *
   * Grabbing values for title, content and image.
   *
   * For image, I used the file.usage service to save.
   *
   * Drupal set message from BS is used to show messages/errors.
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
      $file_usage->add($image_file, 'contact', 'contact', intval($image_fid[0]));
    } else {
      drupal_set_message(t('An error occured while uploading the image. Try again later.'), 'error');
    }

    $state_form_variables = [
      'title' => $title,
      'content' => $content,
      'image' => $image_fid,
    ];

    \Drupal::state()->setMultiple($state_form_variables);
    \Drupal::messenger()->addMessage('Your content has been saved to the Drupal state.');
  }

}
