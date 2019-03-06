<?php

namespace Drupal\drupal_form\Controller;

use Drupal\node\NodeInterface;
use Drupal\user\UserInterface;
use Drupal\node\Entity\Node;
use Drupal\Core\Controller\ControllerBase;

class UpcastController extends ControllerBase{
  public function upcast(NodeInterface $node) {
    $a=$node->getOwner();
    $authorName=$a->getUsername();
    return array(
        '#type' =>'markup',
       '#markup' => t('Hello @author_name',array('@author_name' => $authorName)),
    );
  }
}