<?php
$style = [
    'color' => 'red',
    'font-size' => '14',
    'font-weight' => 'bold',
];
?>

<h1 id="hello">サンプル見出し</h1>

<p style='<?= $this->Html->style($style, false) ?>'>
    Hello
</p>
