<h1>サンプル見出し</h1>
<p>これはサンプルページです。</p>

<?= $this->Form->create() ?>
<fieldset>
    <?= $this->Form->text('name') ?>
    <?= $this->Form->password('password') ?>
</fieldset>
<?= $this->Form->button('送信') ?>
<?= $this->Form->end() ?>
