<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal[]|\Cake\Collection\CollectionInterface $pubJournals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pub Journal'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pubJournals index large-9 medium-8 columns content">
    <h3><?= __('Pub Journals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publication_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publication_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('online_issn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('print_issn') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pubJournals as $pubJournal): ?>
            <tr>
                <td><?= $this->Number->format($pubJournal->id) ?></td>
                <td><?= h($pubJournal->author) ?></td>
                <td><?= h($pubJournal->publication_name) ?></td>
                <td><?= h($pubJournal->name) ?></td>
                <td><?= h($pubJournal->location) ?></td>
                <td><?= h($pubJournal->publication_date) ?></td>
                <td><?= h($pubJournal->online_issn) ?></td>
                <td><?= h($pubJournal->link) ?></td>
                <td><?= h($pubJournal->print_issn) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pubJournal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pubJournal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pubJournal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pubJournal->id)]) ?>
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
