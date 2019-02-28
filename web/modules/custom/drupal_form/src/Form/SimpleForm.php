<?php

namespace Drupal\drupal_form\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SimpleForm extends ConfigFormBase {
    public function getFormId()
    {
        return 'drupal_form';
    }
    protected function getEditableConfigNames() {
        return [ 
          'simple.settings',
        ];
    }
    
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['number_1']=[
            '#type'=> 'textfield',
            '#title'=> $this->t('First Name '),
        ];

        $form['number_2']=[
            '#type'=> 'textfield',
            '#title'=> $this->t('Last Name '),
        ];
        $form['submit']=[
            '#type'=> 'submit',
            '#value'=> $this->t('Save'),
        ];
        return $form; 
    }
    public function validateForm(array &$form, FormStateInterface $form_state) {
        

    }
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $values = $form_state->getValues();
        $this->config('simple.settings')
            ->set('variable_name', $values)
            ->save();
        parent::submitForm($form, $form_state);

    }
}