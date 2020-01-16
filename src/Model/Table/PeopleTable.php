<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PeopleTable extends Table
{
    /**
     * 初期化
     *
     * @param array $config 設定
     * @return void
     */
    public function initialize(array $config)
    {
        // $this->hasMany('Boards'); // コメントアウトする
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
        $validator->notEmpty('password', '必須項目です。');
        $validator->notEmpty('comment', '必須項目です。');

        return $validator;
    }

    /**
     * アプリケーションルール
     *
     * @param RulesChecker $rules ルール
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->isUnique(['name'], '既に登録済みです。');

        return $rules;
    }
}
