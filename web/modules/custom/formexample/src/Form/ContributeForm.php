<?php
/**
 * @file
 * Contains \Drupal\formexample\Form\ContributeForm.
 */

namespace Drupal\formexample\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Contribute form.
 */
class ContributeForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'formexample_contribute';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#description' => t('Please provide your title.'),
    );
    $form['description'] = array(
      '#type' => 'textfield',
      '#title' => t('Description'),
      '#description' => t('Please provide your type.'),
    );
    $form['phone_number'] = array(
      '#type' => 'textfield',
      '#title' => t('Phone Number'),
    );

    $form['actions'] = [
      '#type' => 'actions',
    ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ]; 

    return $form;
  }

  /**
   * {@inheritdoc}
   * {@todo} Skipping for now
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $value = $form_state->getValue('description');
    if(strlen($value) > 10) {
      $form_state->setErrorByName('description', $this->t('Your description is too long. It should be under 10 characters.'));
    };
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      //drupal_set_message($key . ': ' . $value); // Simply displaying the submitted values to the user
    }
    kint($key, $value);
  }

  /**
   * {@inheritdoc}
   * Returning back to an existing precised URL.
   */
  public function getCancelUrl() {
    return new Url('helloworld');
  }

  public function getQuestion() {
    // return t('Do you want to delete %id?', ['%id' => $this->id]);
    return t('Do you want to delete this? Duh, there is nothing here but it is fine.');
  }
}
?>