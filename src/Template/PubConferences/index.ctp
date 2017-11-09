<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubConference[]|\Cake\Collection\CollectionInterface $pubConferences
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pub Conference'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pubConferences index large-9 medium-8 columns content">
    <h3><?= __('Pub Conferences') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pubConferences as $pubConference): ?>
            <tr>
                <td><?= $this->Number->format($pubConference->id) ?></td>
                <td><?= h($pubConference->author) ?></td>
                <td><?= h($pubConference->name) ?></td>
                <td><?= h($pubConference->date) ?></td>
                <td><?= h($pubConference->city) ?></td>
                <td><?= h($pubConference->country) ?></td>
                <td><?= h($pubConference->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pubConference->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pubConference->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pubConference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pubConference->id)]) ?>
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
