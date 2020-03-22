<?php
namespace App\Controller;

use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class BoardsController extends AppController
{
    private $people;
    public $paginate = [
        'limit' => 5,
        'order' => [
            'id' => 'DESC',
        ],
        'contain' => ['People'],
    ];

    /**
     * 初期化
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->people = TableRegistry::get('People');
        $this->loadComponent('Paginator');
        $this->loadComponent('DataArray');

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
        $data = $this->paginate($this->Boards); // ページネーション利用
        // $data = $this->Boards->find('all'); // 通常のfind利用
        $this->set('data', $this->DataArray->getMergedArray($data));
    }

    /**
     * 新規作成
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->isPost()) {
            if (!$this->people->checkNameAndPass($this->request->getData())) {
                $this->Flash->error('名前かパスワードを確認ください。');
            } else {
                $res = $this->people->find()
                    ->where(['name' => $this->request->getData('name')])
                    ->andWhere(['password' => $this->request->getData('password')])
                    ->first();
                $board = $this->Boards->newEntity();
                $board->name = $this->request->getData('name');
                $board->title = $this->request->getData('title');
                $board->content = $this->request->getData('content');
                $board->person_id = $res['id'];
                if ($this->Boards->save($board)) {
                    $this->redirect(['action' => 'index']);
                }
            }
        }

        $this->set('entity', $this->Boards->newEntity());
    }

    /**
     * 詳細
     *
     * @param int $param ID
     * @return void
     */
    public function show($param = 0)
    {
        $data = $this->Boards
            ->find()
            ->where(['Boards.id' => $param])
            ->contain(['People'])
            ->first();

        $this->set('data', $data);
    }

    /**
     * 詳細２
     *
     * @param int $param ID
     * @return void
     */
    public function show2($param = 0)
    {
        $data = $this->people->get($param);
        $this->set('data', $data);
    }

    /**
     * 編集
     *
     * @param int $param ID
     * @return void
     */
    public function edit($param = 0)
    {
        if ($this->request->isPut()) {
            $board = $this->Boards
                ->find()
                ->where(['Boards.id' => $param])
                ->contain(['People'])
                ->first();
            $board->title = $this->request->data['title'];
            $board->content = $this->request->data['content'];
            $board->person_id = $this->request->data['person_id'];
            if (!$this->people->checkNameAndPass($this->request->data)) {
                $this->Flash->error('名前かパスワードを確認ください。');
            } else {
                if ($this->Boards->save($board)) {
                    $this->redirect(['action' => 'index']);
                }
            }
        } else {
            $board = $this->Boards
                ->find()
                ->where(['Boards.id' => $param])
                ->contain(['People'])
                ->first();
        }

        $this->set('entity', $board);
    }
}
