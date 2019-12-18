<?php
namespace App\Controller;

class HelloController extends AppController
{
    public function initialize()
    {
        $this->viewBuilder()->layout('Hello');
        $this->set('msg', 'Hello/index');
        $this->set('footer', 'Hello\footer2');
    }

    public function index()
    {
        $result = "";
        if ($this->request->isPost()) {
            $result = $this->request->data['HelloForm']['date'];
        } else {
            $result = "なにか書いて送信してください。";
        }
        $this->set("result", $result);
    }

    public function sendForm()
    {
        $str = $this->request->data('text1');
        $result = "";
        if ($str != "") {
            $result = "you type: " . $str;
        } else {
            $result = "empty.";
        }
        $this->set("result", h($result));
    }
}
