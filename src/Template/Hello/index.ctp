<h1 id="hello">サンプル見出し</h1>
<pre>
<?php print_r($result); ?>
</pre>
<?php
  echo $this->Form->create(null,
    ['type'=>'post', 'url'=>['action'=>'index']]);
  echo $this->Form->dateTime('HelloForm.date');
  echo $this->Form->submit("送信");
  echo $this->Form->end();
?>
