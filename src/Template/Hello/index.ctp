<h1>サンプル見出し</h1>
<p>
  <?=$result; ?>
</p>
<?=$this->Form->create(null,
  ['type'=>'post', 'url'=>['action'=>'index']]) ?>
  <!---
  ↓テキストの以下ではHTMLのid属性が付与されない
  <?=$this->Form->checkbox("HelloForm.check1",
    ['checked'=>true]) ?>
  --->
  <?=$this->Form->checkbox("HelloForm.check1",
    ['checked'=>true, 'id' => 'helloform-check1']) ?>
  <!--- ↓HTMLのfor=の値が「helloform-check1」となり、テキストの出力結果と異なる --->
  <?=$this->Form->label('HelloForm.check1') ?>
  <?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>
