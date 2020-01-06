<?php
namespace App\Controller;

class BoardsController extends AppController
{
    /**
     * 一覧
     *
     * @param int $id BoardsテーブルのID
     * @return void
     */
    public function index($id = null)
    {
        $data = $this->Boards->find('all');
        $this->set('data', $data);
        $this->set('entity', $this->Boards->newEntity());
    }

    /**
     * 新規作成
     *
     * @return void
     */
    public function addRecord()
    {
        if ($this->request->is('post')) {
            $board = $this->Boards->newEntity($this->request->data);
            if ($this->Boards->save($board)) {
                $this->redirect(['action' => 'index']);
            }
        }

        $this->set('entity', $board);
    }
}
