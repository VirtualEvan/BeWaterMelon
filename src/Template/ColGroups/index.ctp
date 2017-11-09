<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColGroup[]|\Cake\Collection\CollectionInterface $colGroups
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Col Group'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="colGroups index large-9 medium-8 columns content">
    <h3><?= __('Col Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colGroups as $colGroup): ?>
            <tr>
                <td><?= $this->Number->format($colGroup->id) ?></td>
                <td><?= h($colGroup->name) ?></td>
                <td><?= h($colGroup->department) ?></td>
                <td><?= h($colGroup->company) ?></td>
                <td><?= h($colGroup->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $colGroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $colGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $colGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $colGroup->id)]) ?>
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
