<h1><?= $this->RgbText->redString(__('board')) ?></h1>
<p>
    <?= $this->RgbText->greenLink(__('post'), '/boards/add') ?>
</p>

<div>
    <table>
        <?php $flg = true ?>
        <?php foreach ($merged as $arr) : ?>
        <?php if ($flg) : ?>
        <tr>
            <?php foreach ($arr as $key => $item) : ?>
            <th><?= $key ?></th>
            <?php endforeach ?>
        </tr>
        <?php $flg = false ?>
        <?php endif ?>
        <tr>
            <?php foreach ($arr as $item): ?>
            <td><?= $item ?></td>
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
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
