<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResPatent[]|\Cake\Collection\CollectionInterface $resPatents
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Res Patent'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resPatents index large-9 medium-8 columns content">
    <h3><?= __('Res Patents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resPatents as $resPatent): ?>
            <tr>
                <td><?= $this->Number->format($resPatent->id) ?></td>
                <td><?= h($resPatent->name) ?></td>
                <td><?= h($resPatent->code) ?></td>
                <td><?= h($resPatent->year) ?></td>
                <td><?= h($resPatent->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $resPatent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resPatent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resPatent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resPatent->id)]) ?>
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
