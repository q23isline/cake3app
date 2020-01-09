<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BoardsTable extends Table
{
    /**
     * バリデーション
     *
     * @param Validator $validator バリデート
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator->integer('id');
        $validator->notEmpty('name')
            ->minLength('name', 3, '3文字以上入力ください。')
            ->maxLength('name', 20, '20文字以下で入力ください。');
        $validator->notEmpty('title');
        $validator->notEmpty('content');

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
        $rules->add($rules->isUnique(['name'], 'すでに登録済みです。'));

        return $rules;
    }
}
