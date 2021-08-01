<?php

/**
 * @file
 * Contains Drupal\switch_theme\Form\SettingsForm.
 */

namespace Drupal\switch_theme\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 *
 * @package Drupal\switch_theme\Form
 */
class SwitchThemeForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'switch_theme.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'switch_theme_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('switch_theme.settings');

    $form['default_css'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Default CSS'),
	    '#attributes' => array(
        'placeholder' => t('Add Default CSS File Path Here'),
      ),
	    '#default_value' => $config->get('default_css'),
      '#description' => t('/themes/theme_name/css/style.css'),
    );
	  
	  $form['dark_css'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Dark CSS'),
	    '#attributes' => array(
        'placeholder' => t('Add Dark CSS File Path Here'),
      ),
      '#default_value' => $config->get('dark_css'),
      '#description' => t('/themes/theme_name/css/dark.css'),
    );
	
      return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
     parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('switch_theme.settings')
         ->set('default_css', $form_state->getValue('default_css'))
	       ->set('dark_css', $form_state->getValue('dark_css'))
         ->save();
  }

}