<?php

namespace Drupal\drupal_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Logger\LoggerChannelFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BaseForm extends FormBase {
   
protected $loggerFactory;

public function __construct(LoggerChannelFactory $loggerFactory) {
    $this->loggerFactory = $loggerFactory->get('formdata');
  }
  public static function create(ContainerInterface $container){
    return new static ($container->get('logger.factory'));
  }
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
        $this->loggerFactory->notice('First  name :' . $form_state->getValue('fname') . '  Last name :' . $form_state->getValue('lname'));

        $this->messenger()->addMessage($this->t('Hello '. $name));
        

    }
}