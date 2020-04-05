<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NextBoards Controller
 *
 * @property \App\Model\Table\NextBoardsTable $NextBoards
 *
 * @method \App\Model\Entity\NextBoard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NextBoardsController extends AppController
{
    /**
     * 初期化
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        // ログインなしですべてのアクションを許可
        $this->Auth->allow();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['People'],
        ];
        $nextBoards = $this->paginate($this->NextBoards);

        $this->set(compact('nextBoards'));
    }

    /**
     * View method
     *
     * @param string|null $id Next Board id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nextBoard = $this->NextBoards->get($id, [
            'contain' => ['People'],
        ]);

        $this->set('nextBoard', $nextBoard);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nextBoard = $this->NextBoards->newEntity();
        if ($this->request->is('post')) {
            $nextBoard = $this->NextBoards->patchEntity($nextBoard, $this->request->getData());
            if ($this->NextBoards->save($nextBoard)) {
                $this->Flash->success(__('The next board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The next board could not be saved. Please, try again.'));
        }
        $people = $this->NextBoards->People->find('list', ['limit' => 200]);
        $this->set(compact('nextBoard', 'people'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Next Board id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nextBoard = $this->NextBoards->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nextBoard = $this->NextBoards->patchEntity($nextBoard, $this->request->getData());
            if ($this->NextBoards->save($nextBoard)) {
                $this->Flash->success(__('The next board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The next board could not be saved. Please, try again.'));
        }
        $people = $this->NextBoards->People->find('list', ['limit' => 200]);
        $this->set(compact('nextBoard', 'people'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Next Board id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nextBoard = $this->NextBoards->get($id);
        if ($this->NextBoards->delete($nextBoard)) {
            $this->Flash->success(__('The next board has been deleted.'));
        } else {
            $this->Flash->error(__('The next board could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * 親ノードと子ノードを一覧表示する
     *
     * @param int $id NextBoardsテーブルのID
     * @return void
     */
    public function show($id = null)
    {
        if (empty($id)) {
            $this->getTreeBoard(0);
        } else {
            $this->getTreeBoard($id);
        }
    }

    /**
     * NextBoardsとその子を取得する
     *
     * @param int $id NextBoardsテーブルのID
     * @return void
     */
    public function getTreeBoard($id)
    {
        if ($id != 0) {
            $data = $this->NextBoards
                ->find()
                ->where(['NextBoards.id' => $id])
                ->contain(['People']);
            $this->set('data', $data);
            if (!empty($data)) {
                $child = $this->NextBoards
                    ->find('children', ['for' => $id], false)
                    ->find('threaded')
                    ->contain(['People']);
                $this->set('child', $child);
            }
        } else {
            $query = $this->NextBoards->find('treeList', [
                'keyPath' => 'id',
                'valuePath' => 'title',
                'spacer' => '　　',
            ]);
            $this->set('query', $query);
            $child = $this->NextBoards
                ->find()
                ->where(['parent_id' => 0])
                ->contain(['People']);
            $this->set('child', $child);
        }
    }
}
