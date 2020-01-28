<?php
$style = [
    'color' => 'red',
    'font-size' => '14',
    'font-weight' => 'bold',
];
$sampleImage = [
    'width' => '200',
    'height' => '200',
    'alt' => 'sample image',
];
$pStyle = [
    'align' => 'center',
    'font-size' => '24pt',
];
?>

<?= $this->Html->meta(
    'keywords',
    null,
    ['content' => 'php, cakephp, bake, フレームワーク'],
    false
) ?>

<h1 id="hello">サンプル見出し</h1>

<p style='<?= $this->Html->style($style, false) ?>'>
    Hello
</p>

<?= $this->Html->image('sample.jpg', $sampleImage) ?>

<?= $this->Html->link('<<sample link>>', 'http://google.com', ['target' => '_blank']) ?>

<?= $this->Html->para('p_style', 'これは、&lt;p&gt;タグを自動生成したものです。', $pStyle) ?>

<?= $this->Html->div('div_style', 'これは、&lt;div&gt;タグを自動生成したものです。', ['onclick' => 'alert("クリックしました。")']) ?>

<span style='font-size: 18pt; font-weight: 700;'>
    <?= $this->Html->nestedList(
        [
            '階層化されたリスト' => [
                '最初の項目',
                '次の項目' => [
                    'サブ項目１',
                    'サブ項目２',
                ],
                '最後の項目' => [
                    'サブ項目A',
                    'サブ項目B',
                ],
            ],
        ],
        ['style' => 'font-size: smaller; font-weight: lighter', 'tag' => 'ol'],
        ['style' => 'color: #006600']
    ) ?>
</span>
