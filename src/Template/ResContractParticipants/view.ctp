<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResContractParticipant $resContractParticipant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Res Contract Participant'), ['action' => 'edit', $resContractParticipant->res_contract_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Res Contract Participant'), ['action' => 'delete', $resContractParticipant->res_contract_id], ['confirm' => __('Are you sure you want to delete # {0}?', $resContractParticipant->res_contract_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Res Contract Participants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Res Contract Participant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Res Contracts'), ['controller' => 'ResContracts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Res Contract'), ['controller' => 'ResContracts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="resContractParticipants view large-9 medium-8 columns content">
    <h3><?= h($resContractParticipant->res_contract_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Res Contract') ?></th>
            <td><?= $resContractParticipant->has('res_contract') ? $this->Html->link($resContractParticipant->res_contract->id, ['controller' => 'ResContracts', 'action' => 'view', $resContractParticipant->res_contract->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participant') ?></th>
            <td><?= h($resContractParticipant->participant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($resContractParticipant->link) ?></td>
        </tr>
    </table>
</div>
