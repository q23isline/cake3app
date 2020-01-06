<?php
namespace App\Controller;

// 以下のuse文を追記する
use Cake\Core\Exception\Exception;
use Cake\Log\Log;

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
        $data = $this->Boards->find();
        if ($this->request->is('post')) {
            $input = $this->request->data['input'];
            $data = $this->Boards
                         ->find()
                         ->where(function ($exp, $q) use ($input) {
                             return $exp->eq('id', $input);
                         });
        }
        $this->set('data', $data);
        $this->set('entity', $this->Boards->newEntity());
    }

    /**
     * 新規作成
     *
     * @return redirect 一覧へ
     */
    public function addRecord()
    {
        if ($this->request->is('post')) {
            $board = $this->Boards->newEntity($this->request->data);
            $this->Boards->save($board);
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * 編集
     *
     * @return redirect 一覧へ
     */
    public function editRecord()
    {
        if ($this->request->is('post')) {
            $arr1 = ['name' => $this->request->data['name']];
            $arr2 = ['title' => $this->request->data['title']];
            $this->Boards->updateAll($arr2, $arr1);
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * 削除
     *
     * @return void
     */
    public function delRecord()
    {
        if ($this->request->is('post')) {
            $this->Boards->deleteAll(
                ['name' => $this->request->data['name']]
            );
        }

        $this->redirect(['action' => 'index']);
    }
}
