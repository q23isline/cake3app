<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Query;
use Cake\ORM\Table;

class SuperTableBehavior extends Behavior
{
    /**
     * 初期化処理
     *
     * @param array $config 設定
     * @return void
     */
    public function initialize(array $config)
    {
    }

    /**
     * ランダムなレコードを取得する
     *
     * @return object 1レコード
     */
    public function anyData()
    {
        $count = $this->_table
            ->find()
            ->count();
        $n = mt_rand(0, $count - 1);
        $data = $this->_table
            ->find()
            ->offset($n)
            ->first();

        return $data;
    }

    /**
     * find()メソッドの拡張、optionにマッチするランダムなレコードを取得する
     *
     * @param Query $query クエリ
     * @param array $options オプション
     * @return object 1レコード
     */
    public function findSomething(Query $query, array $options)
    {
        $count = $query->where([
                "{$options['field']} like " => $options['value'],
            ])
            ->count();
        $n = mt_rand(0, $count - 1);
        $data = $query->where([
                "{$options['field']} like " => $options['value'],
            ])
            ->offset($n)
            ->first();

        return $data;
    }
}
