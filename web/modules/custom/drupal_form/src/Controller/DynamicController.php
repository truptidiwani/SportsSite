<?php

namespace Drupal\drupal_form\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Defines DynamicController class.
 */
class DynamicController extends ControllerBase {

  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */
  public function content($name) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello '. $name ),
    ];
  }

}