<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class DataArrayComponent extends Component
{
    public $name = 'DataArray';

    /**
     * 複数のモデルに分かれている配列を１つにまとめて返却する
     *
     * @param object $data モデルオブジェクト
     * @return array
     */
    public function getMergedArray($data)
    {
        $arr = [];
        foreach ($data as $obj) {
            array_push($arr, $obj->toArray());
        }

        return $arr;
    }
}
