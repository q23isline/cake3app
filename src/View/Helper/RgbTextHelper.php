<?php
namespace App\View\Helper;

use Cake\View\Helper;

class RgbTextHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * 初期化処理
     *
     * @param array $config 設定
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
    }

    /**
     * 赤文字を返却
     *
     * @param string $str 表示する文字
     * @return string HTML情報を含む文字列
     */
    public function redString($str)
    {
        return "<span style='background-color: #FF0000; color: #FFFFFF'>{$str}</span>";
    }

    /**
     * 緑文字を返却
     *
     * @param string $str 表示する文字
     * @return string HTML情報を含む文字列
     */
    public function greenString($str)
    {
        return "<span style='background-color: #00FF00; color: #FFFFFF'>{$str}</span>";
    }

    /**
     * 青文字を返却
     *
     * @param string $str 表示する文字
     * @return string HTML情報を含む文字列
     */
    public function blueString($str)
    {
        return "<span style='background-color: #0000FF; color: #FFFFFF'>{$str}</span>";
    }

    /**
     * 赤文字リンクを返却
     *
     * @param string $str 表示する文字
     * @param string $url URL
     * @return string リンク情報を含む文字列
     */
    public function redLink($str, $url)
    {
        $style = 'background-color: #FF0000; color: #FFFFFF';

        return $this->Html->link($str, $url, ['style' => $style]);
    }

    /**
     * 緑文字リンクを返却
     *
     * @param string $str 表示する文字
     * @param string $url URL
     * @return string リンク情報を含む文字列
     */
    public function greenLink($str, $url)
    {
        $style = 'background-color: #00FF00; color: #FFFFFF';

        return $this->Html->link($str, $url, ['style' => $style]);
    }

    /**
     * 青文字リンクを返却
     *
     * @param string $str 表示する文字
     * @param string $url URL
     * @return string リンク情報を含む文字列
     */
    public function blueLink($str, $url)
    {
        $style = 'background-color: #0000FF; color: #FFFFFF';

        return $this->Html->link($str, $url, ['style' => $style]);
    }
}
