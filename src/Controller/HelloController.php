<?php
namespace App\Controller;

class HelloController extends AppController {
  public function index(){
    $this->name = 'Hello';
    $this->autoRender = false;
    echo "hello world!";
  }
}
