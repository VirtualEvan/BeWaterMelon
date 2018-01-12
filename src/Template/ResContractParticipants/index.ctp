<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResContractParticipant[]|\Cake\Collection\CollectionInterface $resContractParticipants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contract Participant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'ResContracts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'ResContracts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resContractParticipants index large-9 medium-8 columns content">
    <h3><?= __('Contract Participants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('res_contract_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('participant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resContractParticipants as $resContractParticipant): ?>
            <tr>
                <td><?= $resContractParticipant->has('res_contract') ? $this->Html->link($resContractParticipant->res_contract->id, ['controller' => 'ResContracts', 'action' => 'view', $resContractParticipant->res_contract->id]) : '' ?></td>
                <td><?= h($resContractParticipant->participant) ?></td>
                <td><?= h($resContractParticipant->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $resContractParticipant->res_contract_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resContractParticipant->res_contract_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resContractParticipant->res_contract_id], ['confirm' => __('Are you sure you want to delete # {0}?', $resContractParticipant->res_contract_id)]) ?>
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
