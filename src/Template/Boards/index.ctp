<h1><?= $this->RgbText->redString(__('board')) ?></h1>
<p>
    <?= $this->RgbText->greenLink(__('post'), '/boards/add') ?>
</p>

<div>
    <table>
        <tr>
            <th><?= $this->Paginator->sort('id', '投稿順') ?></th>
            <th><?= $this->Paginator->sort('Person.name', '名前') ?></th>
            <th><?= $this->Paginator->sort('title', 'タイトル') ?></th>
        </tr>
        <?php foreach ($data as $obj): ?>
        <?= $this->Html->tableCells(
            [
                $obj['id'],
                $obj['person']['name'],
                $obj['title'],
            ],
            ['style' => 'color:#000066; background-color: #CCCCFF'],
            ['style' => 'color:#006600; background-color:#EEFFEE'],
            false,
            true
        ) ?>
        <?php endforeach; ?>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->numbers([
                'before' => $this->Paginator->hasPrev() ? $this->Paginator->first('<<') . '・' : '',
                'after' => $this->Paginator->hasNext() ? '・' . $this->Paginator->last('>>') : '',
                'modulus' => 4,
                'separator' => '・',
            ]) ?>
        </ul>
    </div>
</div>

<?= $this->RgbText->blueLink('※トップに戻る', '/') ?>

<?= $this->element('SampleBanner') ?>
