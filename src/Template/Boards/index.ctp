<h1>Databaseサンプル</h1>
<p>
    <?= $this->Html->link(
        '※投稿する',
        ['action' => 'add']
    ) ?>
</p>
<div>
    <table>
        <?= $this->Html->tableHeaders(
            ['投稿者', 'タイトル'],
            ['style' => 'color:#000066; background-color: #AAAAFF'],
            ['style' => 'color:#000066; background-color: #EEEEFF']
        ) ?>
        <?php foreach ($data as $obj) : ?>
        <?= $this->Html->tableCells(
            [$obj['person']['name'], $obj['title']],
            ['style' => 'color:#000099; background-color: #CCCCFF'],
            ['style' => 'color:#006600; background-color: #EEFFEE'],
            false,
            true
        ) ?>
        <?php endforeach; ?>
    </table>
</div>
