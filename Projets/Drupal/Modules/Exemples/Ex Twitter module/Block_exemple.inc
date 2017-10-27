<?php

  /**
   * @form
   * Create form for the admin
  */

  function block_exemple_form_settings($form, &$form_state) {
    $form['shortcuts'] = array(
      '#type' => 'fieldset',
      '#title' => t('Frontpage social links'),
      '#description' => t('<p>Use this to define the url you will output for the social icons on the footer</p>'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,

    );

    $form['shortcuts']['links']['twitter_url'] = array(
      '#type' => 'textfield',
      '#title' => 'Twitter URL',
      '#description' => 'Paste your twitter url here',
      '#required' => TRUE,
      '#default_value' => _block_exemple_default_twitter_url_value(),
      '#label' => 'Twitter',
    );

    $form['shortcuts']['links']['twitter_text'] = array(
      '#type' => 'textfield',
      '#title' => 'Twitter text',
      '#description' => 'Paste your twitter url here',
      '#required' => TRUE,
      '#default_value' => _block_exemple_default_twitter_text_value(),
      '#label' => 'Twitter',
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save configuration'),
    );
    return $form;
    //return system_settings_form($form);
  }


  /**
   * @return mixed
   */
  function _block_exemple_default_twitter_url_value() {

    $result = db_select('block_exemple', 'u')
      ->fields('u')
      ->execute()
      ->fetchField(1);// Fetch a single field depnding on the column_index
    return $result;

  }

  function _block_exemple_default_twitter_text_value() {

    $result = db_select('block_exemple', 'u')
      ->fields('u')
      ->execute()
      ->fetchField(2);// Fetch a single field depnding on the column_index
    return $result;

  }

  /*
   * Implements hook_validate
   */
  function block_exemple_form_settings_validate($form, &$form_state) {
  }

  /**
   * Implements hook_submit
   */
  function block_exemple_form_settings_submit($form, &$form_state) {
    if ($form_state) {

      db_update('block_exemple')
        ->fields(array(
//          'facebook_url' => $form_state['input']['facebook'],
          'tweeter_url' => $form_state['input']['twitter_url'],
          'tweeter_text' => $form_state['input']['twitter_text'],
//          'mailto_url' => $form_state['input']['mailto'],
        ))
        ->execute();
    };
    drupal_set_message(t('The configuration options for block_exemple twitter have been saved.'));
  }

