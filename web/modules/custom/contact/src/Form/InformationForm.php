<?php

namespace Drupal\contact\Form;

use Drupal\file\Entity\File;
use Drupal\Core\Form\FormBase;

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
   *
   * Building the form for the information form.
   *
   * It will check for any existing values in the Drupal state,
   * and if there are any values, the method will fetch the existing
   * values from the state and the user can edit them.
   *
   * Else the method will display a fresh and new form.
   *
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   * @return void
   */
  public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $existing_values = \Drupal::state()->getMultiple(['title', 'content']);

    $form['contact'] = [
      '#type'         =>  'fieldset',
      '#title'        =>  t('Contact Block contents'),
      '#weight'       =>  5,
      '#collapsible'  =>  TRUE,
      '#collapsed'    =>  TRUE,
    ];

    $form['contact']['title'] = [
      '#type'         =>  'textfield',
      '#title'        =>  $this->t('Title'),
      '#maxlength'    =>  64,
      '#size'         =>  64,
      '#weight'       =>  '0',
      '#required'     =>  TRUE,
      '#default_value'=>  isset($existing_values['title'])
                          ? $existing_values['title']
                          : NULL,
    ];

    $form['contact']['content'] = [
      '#type'         =>  'textarea',
      '#title'        =>  $this->t('Content'),
      '#weight'       =>  '0',
      '#default_value'=>  isset($existing_values['content'])
                          ? $existing_values['content']
                          : NULL,
    ];
    $form['contact']['image'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Image Reference'),
      '#upload_validators' => [
        'file_validate_extensions' => array('gif png jpg jpeg'),
        'file_validate_size' => array(25600000),
      ],
      '#preview_image_style' => 'medium',
      '#upload_location' => 'public://contact_content/',
    ];

    $form['contact']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   *
   * This method will take of the necessary validations for the form
   *
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   * @return void
   *
   */
  public function validateForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state) {
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
   *
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   * @return void
   */
  public function submitForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $title = $form_state->getValue('title');
    $content = $form_state->getValue('content');
    $image_fid = $form_state->getValue('image');

    $this->addImage($image_fid, 'contact', 'contact');

    $state_form_variables = [
      'title' => $title,
      'content' => $content,
      'image' => $image_fid,
    ];

    \Drupal::state()->setMultiple($state_form_variables);
    \Drupal::messenger()->addMessage('Your content has been saved to the Drupal state.');
  }

  /**
   * Saving an image to the file.usage Drupal service.
   *
   * @param mixed $image_fid The unique fid of the image referenced
   * @param string $module The name of the module using this file
   * @param string $type The type of the module
   * @see https://api.drupal.org/api/drupal/core%21modules%21file%21src%21FileUsage%21FileUsageInterface.php/interface/FileUsageInterface/8.2.x
   * @return void
   */
  public function addImage($image_fid, $module, $type) {
    $image_file = File::load($image_fid[0]);
    if (!empty($image_file)) {
      $image_file->setPermanent();
      $image_file->save();
      $file_usage = \Drupal::service('file.usage');
      $file_usage->add($image_file, $module, $type, intval($image_fid[0]));
    } else {
      drupal_set_message(t('An error occured while uploading the image.'), 'error');
    }
  }

}
