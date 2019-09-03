<?php
namespace App\Controller;

class HelloController extends AppController {
  public $name = 'Hello';
  public $autoRender = false;

  public function index(){
    $this->setAction("other"); // フォワード
    // ↓missing controller
    // $this->redirect("./other"); // リダイレクト
  }

  public function other(){
    echo "これは、index以外の表示です。";
  }
}
