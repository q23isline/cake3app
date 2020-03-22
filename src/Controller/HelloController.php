<?php
namespace App\Controller;

use Cake\Event\Event;

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
    }

    /**
     * 一覧
     *
     * @return void
     */
    public function index()
    {
        if ($this->request->isPost()) {
            if (!empty($this->request->data['name']) && !empty($this->request->data['password'])) {
                $this->Flash->success('OK!');
            } else {
                $this->Flash->error('bad...');
            }
        } else {
            $this->Flash->info('please input form:');
        }
    }
}
