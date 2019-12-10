<?php
namespace App\Controller;

// 以下のuse文を追記する
use \Exception;
use Cake\Log\Log;

class BoardsController extends AppController {
  public function index(){
    $this->set('entity', $this->Boards->newEntity());
    if ($this->request->is('post')) {
      $id = $this->request->data['id'];
      $data = $this->Boards->findByIdOrName($id, $id);
    } else {
      $data = $this->Boards->find('all');
    }
    $this->set('data', $data->toArray());
    $this->set('count', $data->count());
  }

  public function addRecord(){
    if ($this->request->is('post')){
      $board = $this->Boards->newEntity($this->request->data);
      $this->Boards->save($board);
    }

    return $this->redirect(['action' => 'index']);
  }

  public function delRecord(){
    if ($this->request->is('post')) {
      $this->Boards->deleteAll(
        ['name'=>$this->request->data['name']]
      );
    }

    $this->redirect(['action' => 'index']);
  }
}
