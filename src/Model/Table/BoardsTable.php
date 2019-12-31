<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Event\Event;
use Cake\ORM\Query;
// ↓テキストに不足
use Cake\Datasource\EntityInterface;

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

    public function beforeSave(Event $event, EntityInterface $entity, $options)
    {
        $n = $this->find('all', [
            'conditions' => ['name' => $entity->name]
        ])->count();
        if ($n == 0) {
            return true;
        } else {
            return false;
        }
    }
}
