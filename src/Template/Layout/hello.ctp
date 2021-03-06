<?= $this->Html->doctype('xhtml-strict') ?>
<html lang="ja">
  <head>
    <?=$this->Html->charset('utf-8') ?>
    <title>
      <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css('hello') ?>
    <?php
    echo $this->Html->css('cake.hello');
    echo $this->Html->script('cake.hello');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
  </head>

  <body>
    <div id="container">
      <div id="header">
        <?=$this->element('Hello\header', ['msg'=>$msg]) ?>
      </div>
      <div id="content">
        <?=$this->fetch('content') ?>
      </div>
      <div id="footer">
        <?=$this->element($footer) ?>
      </div>
    </div>
  </body>
</html>
