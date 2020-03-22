<h1><?= $this->RgbText->redString(__('board')) ?></h1>
<p>
    <?= $this->RgbText->greenLink(__('post'), '/boards/add') ?>
</p>

<div>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>title</th>
            <th>content</th>
        </tr>
        <?php foreach ($data as $arr): ?>
        <tr>
            <td><?= $arr['id'] ?></td>
            <td><?= $arr['person']['name'] ?></td>
            <td><?= $arr['title'] ?></td>
            <td><?= $arr['content'] ?></td>
        </tr>
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
