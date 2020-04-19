<?php
namespace App\Shell;

use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class MyCmdShell extends Shell
{
    /**
     * 初期化
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Boards');
    }

    /**
     * 主処理
     *
     * @param int $num BoardsテーブルのID
     * @return void
     */
    public function main($num)
    {
        $data = $this->Boards->get($num);
        $this->out(print_r($data->toArray()));
    }
}
