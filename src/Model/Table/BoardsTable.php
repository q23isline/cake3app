<?php
namespace App\Model\Table;

// ↓テキストに不足
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\Table;

class BoardsTable extends Table
{
    /**
     * Find前処理
     *
     * @param Event $event イベント
     * @param Query $query クエリ
     * @return void
     */
    public function beforeFind(Event $event, Query $query)
    {
        $query->order(['name' => 'ASC']);
    }

    /**
     * デフォルト接続DB
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'default';
    }

    /**
     * Save前処理
     *
     * @param Event $event イベント
     * @param EntityInterface $entity エンティティ
     * @param array $options オプション
     * @return bool
     */
    public function beforeSave(Event $event, EntityInterface $entity, $options)
    {
        $n = $this->find('all', [
            'conditions' => ['name' => $entity->name],
        ])->count();
        if ($n == 0) {
            return true;
        } else {
            return false;
        }
    }
}
