<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Event\Event;
use Cake\ORM\Query;

class BoardsTable extends Table
{
    public function beforeFind(Event $event, Query $query)
    {
        $query->order(['name'=>'ASC']);
    }

    public static function defaultConnectionName()
    {
        return 'default';
    }
}
