<?php
namespace PersonalDatum\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class PersonalDataInfoComponent extends Component
{
    public $name = "PersonalDataInfo";

    /**
     * 名前からPersonalDatumテーブルの情報を取得
     *
     * @param string $name 名前
     * @return object PersonalDatumテーブル情報
     */
    public function getByName($name)
    {
        $table = TableRegistry::get("PersonalDatum");
        $data = $table->findByUsername($name)->first();

        return $data;
    }
}
