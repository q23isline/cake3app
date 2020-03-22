<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\InvalidCsrfTokenException;

class HelloController extends AppController
{
    /**
     * 初期化
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        // ↓テキストではコメントではないが、CakePHP3.8.9ではデフォルトでCSRFが有効であり、
        // ここでも有効の設定を行うとトークンが一致しなくなり、エラーとなるためコメント化
        // CakePHP3.6以降からmiddlewareレベルで有効らしい
        // $this->loadComponent('Csrf');

        $this->loadComponent('Cookie');
        $this->Cookie->config('path', '/');
        $this->Cookie->config('domain', 'localhost');
        $this->Cookie->config('expires', 0);
        $this->Cookie->config('secure', false);
        $this->Cookie->config('httpOnly', true);
        $this->Cookie->config('encryption', false);

        $this->loadComponent('Security');
    }

    /**
     * 事前処理
     *
     * @param Event $event イベント
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        // ↓テキストではコメントではないが、componentでCSRFが設定できないために、
        // 以下で無効にすることはできない
        // config/routes.phpのscopeでそれぞれ手動で有効、無効の設定を記述することで
        // 部分的な対応が可能そうである
        // $this->eventManager()->off($this->Csrf);

        parent::initialize();

        // ログインなしですべてのアクションを許可
        $this->Auth->allow();

        $this->Security->config('blackHoleCallback', 'error');
        // セキュアな場合のみ受け付ける
        $this->Security->requireSecure();
    }

    /**
     * 一覧
     *
     * @return void
     */
    public function index()
    {
        $data = $this->Cookie->read('mykey');
        $this->set('data', $data);
    }

    /**
     * 書き込み
     *
     * @return void
     */
    public function write()
    {
        $val = $this->request->query['val'];
        $this->Cookie->write('mykey', $val);
        $this->redirect(['action' => 'index']);
    }

    /**
     * エラー
     *
     * @return void
     */
    public function error()
    {
        echo "<html>
                <head>
                    <title>ERROR</title>
                </head>
                <body style='background-color: black; color: white;'>
                    <h1>SECURITY ERROR!!!</h1>
                </body>
            </html>";
        exit;
    }
}
