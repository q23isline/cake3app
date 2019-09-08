<h1>サンプル見出し</h1>
<p>
  <?=$result; ?>
</p>
<?=$this->Form->create(null,
  ['type'=>'post', 'url'=>['action'=>'index']]) ?>
  <?= $this->Form->select('HelloForm.select1',
    [
      'ウィンドウズ'=>'Windows',
      'リナックス'=>'Linux',
      'マックOS'=>'MacOS X'
    ],
    ['size'=>5, 'empty'=>'項目を選んでください']) ?>
  <?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>
