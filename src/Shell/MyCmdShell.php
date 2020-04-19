<?php
namespace App\Shell;

use Cake\Console\ConsoleOptionParser;
use Cake\Console\ConsoleOutput;
use Cake\Console\Shell;
use Cake\Log\Log;

class MyCmdShell extends Shell
{
    public $tasks = ['Db'];

    /**
     * 主処理
     *
     * @return void
     */
    public function main()
    {
        $this->out('※以下のテーブルが利用できます。');
        $this->out('[B]oards');
        $this->out('[P]eople');
        $t = $this->in('テーブルを選択: ', ['B', 'P'], 'B');
        $t = strtoupper($t);
        $table = null;
        $id = $this->in('ID番号を入力: ', null, 1);
        $data = null;
        switch ($t) {
            case 'B':
                $table = 'Boards';
                break;
            case 'P':
                $table = 'People';
                break;
            default:
                $this->info("can't access Database...");
                exit();
        }
        $this->Db->main();
        $this->Db->get($table, $id);
    }
}
