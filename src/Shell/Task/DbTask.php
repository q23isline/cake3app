<?php
namespace App\Shell\Task;

use Cake\Console\ConsoleOptionParser;
use Cake\Console\ConsoleOutput;
use Cake\Console\Shell;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class DbTask extends Shell
{
    /**
     * 主処理
     *
     * @return void
     */
    public function main()
    {
        $this->out();
        $this->out('***Db Task.***');
    }

    /**
     * テーブルのレコード情報を出力する
     *
     * @param string $t テーブル名
     * @param int $id テーブルのID
     * @return void
     */
    public function get($t, $id)
    {
        $table = TableRegistry::get($t);
        $data = $table->get($id);
        $this->out("「{$t}」テーブル id={$id} のレコード");
        foreach ($data->toArray() as $key => $val) {
            $this->out("{$key}: {$val}");
        }
    }
}
