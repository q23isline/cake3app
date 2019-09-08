<h1>サンプル見出し</h1>
<p>
  <?=$result; ?>
</p>
<?=$this->Form->create(null,
  ['type'=>'post', 'url'=>['action'=>'index']]) ?>
  <?= $this->Form->select('HelloForm.select1',
    [
      'PC'=>[
        'ウィンドウズ'=>'Windows',
        'リナックス'=>'Linux',
        'マックOS'=>'MacOS X'
      ],
      'mobile'=>[
        'アンドロイド'=>'Android',
        'アイフォン'=>'iPhone',
        'ガラケー'=>'cellphone'
      ]
    ],
    ['size'=>10, 'empty'=>'項目を選んでください']) ?>
  <?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>
