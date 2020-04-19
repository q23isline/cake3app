<?php
namespace PersonalDatum\View\Helper;

use Cake\View\Helper;

class PersonalDataInfoHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * 初期化
     *
     * @param array $config 設定
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
    }

    /**
     * PersonalDataInfoテーブルの情報を表示する
     *
     * @param object $data PersonalDataInfoテーブル情報
     * @return string HTML文字列
     */
    public function showPersonalDataInfo($data)
    {
        $result = '<table style="width: 300px; font-size: 9pt;">';
        $result .= "    <tr>";
        $result .= "        <th>OWNER:</th>";
        $result .= "        <td>" . $data->username . "</td>";
        $result .= "    </tr>";
        $result .= "    <tr>";
        $result .= "        <th>EMAIL:</th>";
        $result .= "        <td>" . $data->email . "</td>";
        $result .= "    </tr>";
        $result .= "    <tr>";
        $result .= "        <th>TEL:</th>";
        $result .= "        <td>" . $data->tel . "</td>";
        $result .= "    </tr>";
        $result .= "    <tr>";
        $result .= "        <th>ADDRESS:</th>";
        $result .= "        <td>" . $data->address . "</td>";
        $result .= "    </tr>";
        $result .= "</table>";

        return $result;
    }
}
