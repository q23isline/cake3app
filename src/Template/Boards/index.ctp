<h1><?= __('board') ?></h1>
<p>
    <?= $this->Html->link(
        __('post'),
        ['action' => 'add']
    ) ?>
</p>
<p><?= __('{0} post', $count) ?></p>
<div>
    <table>
        <tr>
            <th width='25%'><?= __('user') ?></th>
            <th><?= __('title') ?></th>
        </tr>
        <?php foreach ($data as $obj) : ?>
        <tr>
            <td>
                <?= $this->Html->link(
                    $obj['person']['name'],
                    ['action' => 'show2', $obj['person_id']]
                ) ?>
            </td>
            <td>
                <?= $this->Html->link(
                    $obj['title'],
                    ['action' => 'show', $obj['id']]
                ) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
