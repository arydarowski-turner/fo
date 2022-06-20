<?php

namespace Drupal\auth_dash\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Auth Dashboard settings for this site.
 */
class AuthDashConfig extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'auth_dash_auth_dash_config';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['auth_dash.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['welcome_message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Welcome message'),
      '#default_value' => $this->config('auth_dash.settings')->get('welcome_message'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
//    if ($form_state->getValue('example') != 'example') {
//      $form_state->setErrorByName('example', $this->t('The value is not correct.'));
//    }
//    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('auth_dash.settings')
      ->set('welcome_message', $form_state->getValue('welcome_message'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
