<?php
namespace App\Controller;

// 以下のuse文を追記する
use \Exception;
use Cake\Log\Log;

class BoardsController extends AppController {
  public function index($id = null){
    $this->set('entity', $this->Boards->newEntity());
    if ($id != null) {
      try {
        $entity = $this->Boards->get($id);
        $this->set('entity', $entity);
      } catch(Exception $e) {
        // Logg:write('debug', $e->getMessage());
        // ↑スペル誤り　↓が正しい
        Log::write('debug', $e->getMessage());
      }
    }

    $data = $this->Boards->find('all')->order(['id'=>'DESC']);
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

  public function editRecord() {
    if ($this->request->is('post')) {
      $arr1 = ['name'=>$this->request->data['name']];
      $arr2 = ['title'=>$this->request->data['title']];
      $this->Boards->updateAll($arr2, $arr1);
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
