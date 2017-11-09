<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResContract $resContract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Res Contract'), ['action' => 'edit', $resContract->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Res Contract'), ['action' => 'delete', $resContract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resContract->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Res Contracts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Res Contract'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Res Contract Participants'), ['controller' => 'ResContractParticipants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Res Contract Participant'), ['controller' => 'ResContractParticipants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="resContracts view large-9 medium-8 columns content">
    <h3><?= h($resContract->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($resContract->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scheduling') ?></th>
            <td><?= h($resContract->scheduling) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsor Link') ?></th>
            <td><?= h($resContract->sponsor_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($resContract->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Res Contract Participants') ?></h4>
        <?php if (!empty($resContract->res_contract_participants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Res Contract Id') ?></th>
                <th scope="col"><?= __('Participant') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($resContract->res_contract_participants as $resContractParticipants): ?>
            <tr>
                <td><?= h($resContractParticipants->res_contract_id) ?></td>
                <td><?= h($resContractParticipants->participant) ?></td>
                <td><?= h($resContractParticipants->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ResContractParticipants', 'action' => 'view', $resContractParticipants->res_contract_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ResContractParticipants', 'action' => 'edit', $resContractParticipants->res_contract_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ResContractParticipants', 'action' => 'delete', $resContractParticipants->res_contract_id], ['confirm' => __('Are you sure you want to delete # {0}?', $resContractParticipants->res_contract_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
