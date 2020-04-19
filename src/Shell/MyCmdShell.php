<?php
namespace App\Shell;

use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;
use Cake\Log\Log;

class MyCmdShell extends Shell
{
    /**
     * 主処理
     *
     * @param array $num 足したい数値
     * @return void
     */
    public function main(...$num)
    {
        $res = 0;
        foreach ($num as $n) {
            $res += $n;
        }
        $this->out('合計: ' . $res);
    }
}
