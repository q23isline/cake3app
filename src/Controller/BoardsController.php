<?php
namespace App\Controller;

use Cake\Validation\Validator;

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
        $data = $this->Boards->find('all')->contain(['People']);
        $this->set('data', $data);
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
            $validator = new Validator();
            $validator->email('name');
            $errors = $validator->errors($this->request->data);
            if (!empty($errors)) {
                $this->Flash->error('EMAIL ERROR!!');
            } else {
                if ($this->Boards->save($board)) {
                    $this->redirect(['action' => 'index']);
                }
            }

            $this->set('entity', $board);
        }
    }
}
