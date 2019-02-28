<?php

namespace Drupal\drupal_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class BaseForm extends FormBase {
    public function getFormId()
    {
        return 'drupal_form';
    }
    
    
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['fname']=[
            '#type'=> 'textfield',
            '#title'=> $this->t('First Name '),
        ];

        $form['lname']=[
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

        $name=$form_state->getValue('fname');
        if(1 === preg_match('~[0-9]~', $name)){
            $form_state->setErrorByName('name', $this->t('Cannot have numbers inside name'));
        }
    }
    public function submitForm(array &$form, FormStateInterface $form_state){
         // foreach ($form_state->getValues() as $key => $value){
        //     drupal_set_message(Hello . $key . ': ' . $value);
        //   }
        //drupal_add_message(Hello . $form_state->getValue('fname'));
        $name=$form_state->getValue('fname');
        $this->messenger()->addMessage($this->t('Hello'. $name));
        

    }
}