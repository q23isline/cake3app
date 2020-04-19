<?php
namespace PersonalDatum\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Query;
use Cake\ORM\Table;

class ByNumberBehavior extends Behavior
{
    /**
     * 初期化
     *
     * @param array $config 設定
     * @return void
     */
    public function initialize(array $config)
    {
    }

    /**
     * 引数で指定した数値のn番目の、テーブルのレコードを1つ取得する
     *
     * @param int $n 取得するn番目の番号
     * @return object テーブルのモデル情報
     */
    public function getByNumber($n)
    {
        $data = $this->_table
            ->find()
            ->offset($n)
            ->first();

        return $data;
    }
}
