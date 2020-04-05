<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
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
}
