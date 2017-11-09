<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplVisitor[]|\Cake\Collection\CollectionInterface $pplVisitors
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ppl Visitor'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pplVisitors index large-9 medium-8 columns content">
    <h3><?= __('Ppl Visitors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pplVisitors as $pplVisitor): ?>
            <tr>
                <td><?= $this->Number->format($pplVisitor->id) ?></td>
                <td><?= h($pplVisitor->name) ?></td>
                <td><?= h($pplVisitor->lastname) ?></td>
                <td><?= h($pplVisitor->link) ?></td>
                <td><?= h($pplVisitor->doctor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pplVisitor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pplVisitor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pplVisitor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplVisitor->id)]) ?>
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
