<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActConferenceYear[]|\Cake\Collection\CollectionInterface $actConferenceYears
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Conference Year'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Conferences'), ['controller' => 'ActConferences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conference'), ['controller' => 'ActConferences', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="actConferenceYears index large-9 medium-8 columns content">
    <h3><?= __('Conference Years') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('act_conference_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($actConferenceYears as $actConferenceYear): ?>
            <tr>
                <td><?= $actConferenceYear->has('act_conference') ? $this->Html->link($actConferenceYear->act_conference->name, ['controller' => 'ActConferences', 'action' => 'view', $actConferenceYear->act_conference->id]) : '' ?></td>
                <td><?= h($actConferenceYear->year) ?></td>
                <td><?= h($actConferenceYear->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $actConferenceYear->act_conference_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actConferenceYear->act_conference_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actConferenceYear->act_conference_id], ['confirm' => __('Are you sure you want to delete # {0}?', $actConferenceYear->act_conference_id)]) ?>
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
