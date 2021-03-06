<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NextBoard $nextBoard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Next Boards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nextBoards form large-9 medium-8 columns content">
    <?= $this->Form->create($nextBoard) ?>
    <fieldset>
        <legend><?= __('Add Next Board') ?></legend>
        <?php
            // 参考書ではtextメソッドだったがラベルを表示するためcontrolのtype=textを指定
            echo $this->Form->control('parent_id', [
                'type' => 'text',
            ]);
            echo $this->Form->control('person_id', ['options' => $people]);
            echo $this->Form->control('title');
            echo $this->Form->control('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
