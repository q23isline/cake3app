<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class DataArrayComponent extends Component
{
    public $name = 'DataArray';
    public $controller;

    /**
     * 初期化処理
     *
     * @param array $config 設定
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->controller = $this->_registry->getController();
    }

    /**
     * 複数のモデルに分かれている配列を１つにまとめて返却する
     *
     * @param string $tableName テーブル名
     * @return void
     */
    public function getMergedArray($tableName)
    {
        $table = TableRegistry::get($tableName);
        $data = $table->find()->all();

        $arr = [];
        foreach ($data as $obj) {
            array_push($arr, $obj->toArray());
        }

        $this->controller->set('merged', $arr);
    }
}
