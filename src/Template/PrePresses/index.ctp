<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrePress[]|\Cake\Collection\CollectionInterface $prePresses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pre Press'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prePresses index large-9 medium-8 columns content">
    <h3><?= __('Pre Presses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prePresses as $prePress): ?>
            <tr>
                <td><?= $this->Number->format($prePress->id) ?></td>
                <td><?= h($prePress->name) ?></td>
                <td><?= h($prePress->date) ?></td>
                <td><?= h($prePress->source) ?></td>
                <td><?= h($prePress->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prePress->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prePress->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prePress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prePress->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
