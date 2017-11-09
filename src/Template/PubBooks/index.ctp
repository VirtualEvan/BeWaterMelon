<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubBook[]|\Cake\Collection\CollectionInterface $pubBooks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pub Book'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pubBooks index large-9 medium-8 columns content">
    <h3><?= __('Pub Books') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('editorial') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isbn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('physical_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pubBooks as $pubBook): ?>
            <tr>
                <td><?= $this->Number->format($pubBook->id) ?></td>
                <td><?= h($pubBook->book_name) ?></td>
                <td><?= h($pubBook->author) ?></td>
                <td><?= h($pubBook->editorial) ?></td>
                <td><?= h($pubBook->year) ?></td>
                <td><?= h($pubBook->country) ?></td>
                <td><?= h($pubBook->isbn) ?></td>
                <td><?= h($pubBook->link) ?></td>
                <td><?= h($pubBook->physical_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pubBook->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pubBook->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pubBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pubBook->id)]) ?>
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
