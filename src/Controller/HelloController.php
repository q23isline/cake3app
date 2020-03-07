<?php
namespace App\Controller;

class HelloController extends AppController
{
    /**
     * 初期化
     *
     * @return void
     */
    public function initialize()
    {
        // テキストにないが、Flashコンポーネントが読み込まれないため追加
        parent::initialize();

        // デフォルトのレイアウトはFlashメッセージを自動的に表示するため、オリジナルレイアウト読み込み処理はコメント
        // $this->viewBuilder()->layout('Hello');
        // $this->set('msg', 'Hello/index');
        // $this->set('footer', 'Hello\footer2');
    }

    /**
     * 一覧
     *
     * @return void
     */
    public function index()
    {
        $result = "";
        if ($this->request->isPost()) {
            $result = $this->request->data['HelloForm']['date'];
        } else {
            $result = "なにか書いて送信してください。";
        }
        $this->Flash->set('クリックすると消えます。');
        $this->Flash->success('成功しました！', ['element' => 'flash']);
        $this->Flash->error('失敗です...', ['element' => 'flash']);
        $this->Flash->info('infoメッセージを表示します。');
        $this->set("result", $result);
    }

    /**
     * フォーム送信
     *
     * @return void
     */
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
