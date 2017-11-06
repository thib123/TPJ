<?php
namespace Drupal\hello_world\Controller;
use Drupal\Core\Controller\ControllerBase;


class HelloWorldController extends ControllerBase {


  public function helloWorld() {
    $output = array();
    
    $output['hello_world'] = array(
      '#markup' => $this->t('Hello World!'),
    );
    return $output;
  }
}