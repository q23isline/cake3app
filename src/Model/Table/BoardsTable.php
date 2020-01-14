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

    /**
     * $fieldで指定したフィールドの値が$dataであるレコード数を調べ、
     * その結果が$sumより小さいかチェック
     *
     * @param string $data チェックする値
     * @param string $field フィールド名
     * @param int $sum 同値を許容しない回数
     * @return bool
     */
    public function maxRecords($data, $field, $sum)
    {
        $n = $this->find()
            ->where([$field => $data])
            ->count();

        return $n < $sum ? true : false;
    }
}
