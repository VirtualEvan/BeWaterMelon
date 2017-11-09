<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActConference[]|\Cake\Collection\CollectionInterface $actConferences
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Act Conference'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Act Conference Years'), ['controller' => 'ActConferenceYears', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Act Conference Year'), ['controller' => 'ActConferenceYears', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="actConferences index large-9 medium-8 columns content">
    <h3><?= __('Act Conferences') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acronym') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($actConferences as $actConference): ?>
            <tr>
                <td><?= $this->Number->format($actConference->id) ?></td>
                <td><?= h($actConference->acronym) ?></td>
                <td><?= h($actConference->name) ?></td>
                <td><?= h($actConference->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $actConference->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actConference->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actConference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actConference->id)]) ?>
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
