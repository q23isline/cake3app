<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BoardsTable extends Table
{
    /**
     * 初期化
     *
     * @param array $config 設定
     * @return void
     */
    public function initialize(array $config)
    {
        $this->belongsTo('People');
    }

    /**
     * バリデーション
     *
     * @param Validator $validator バリデート
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator->integer('id');
        $validator->notEmpty('name', '必須項目です。');
        $validator->notEmpty('title', '必須項目です。');
        $validator->notEmpty('content', '必須項目です。');
        $validator->add('name', 'maxRecords', [
            'rule' => ['maxRecords', 'name', 5],
            'message' => __('最大数を超えています。'),
            'provider' => 'table',
        ]);

        return $validator;
    }
}
