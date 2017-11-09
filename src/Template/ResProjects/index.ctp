<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResProject[]|\Cake\Collection\CollectionInterface $resProjects
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Res Project'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Res Project Participants'), ['controller' => 'ResProjectParticipants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Res Project Participant'), ['controller' => 'ResProjectParticipants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resProjects index large-9 medium-8 columns content">
    <h3><?= __('Res Projects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scheduling') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sponsor_link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resProjects as $resProject): ?>
            <tr>
                <td><?= $this->Number->format($resProject->id) ?></td>
                <td><?= h($resProject->name) ?></td>
                <td><?= h($resProject->code) ?></td>
                <td><?= h($resProject->scheduling) ?></td>
                <td><?= h($resProject->sponsor_link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $resProject->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resProject->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resProject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resProject->id)]) ?>
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
