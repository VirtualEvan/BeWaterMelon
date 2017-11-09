<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResContract[]|\Cake\Collection\CollectionInterface $resContracts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Res Contract'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Res Contract Participants'), ['controller' => 'ResContractParticipants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Res Contract Participant'), ['controller' => 'ResContractParticipants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resContracts index large-9 medium-8 columns content">
    <h3><?= __('Res Contracts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scheduling') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sponsor_link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resContracts as $resContract): ?>
            <tr>
                <td><?= $this->Number->format($resContract->id) ?></td>
                <td><?= h($resContract->code) ?></td>
                <td><?= h($resContract->scheduling) ?></td>
                <td><?= h($resContract->sponsor_link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $resContract->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resContract->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resContract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resContract->id)]) ?>
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
