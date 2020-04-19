<?php
namespace App\Shell;

use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;
use Cake\Log\Log;

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
    }

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
        $n = $this->in('ID番号を入力: ', null, 1);
        switch ($t) {
            case 'B':
                $this->boards($n);
                break;
            case 'P':
                $this->people($n);
                break;
            default:
                $this->info("can't access Database...");
                exit();
        }
    }

    /**
     * Boardsテーブルの1レコードを表示する
     *
     * @param int $id BoardsテーブルのID
     * @return void
     */
    public function boards($id)
    {
        $this->loadModel('Boards');
        $data = $this->Boards->get($id);
        $this->out("※Boards id = {$id}");
        $this->out(print_r($data->toArray()));
    }

    /**
     * Peopleテーブルの1レコードを表示する
     *
     * @param int $id PeopleテーブルのID
     * @return void
     */
    public function people($id)
    {
        $this->loadModel('People');
        $data = $this->People->get($id);
        $this->out("※People id = {$id}");
        $this->out(print_r($data->toArray()));
    }
}
