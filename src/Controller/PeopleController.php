<?php

namespace App\Controller;

class PeopleController extends AppController
{
    /**
     * 一覧
     *
     * @param int $id PeopleテーブルのID
     * @return void
     */
    public function index($id = null)
    {
        $this->People->hasMany('Boards');
        $data = $this->People
            ->find('all')
            ->contain(['Boards']);
        $this->set('data', $data);
    }
}
