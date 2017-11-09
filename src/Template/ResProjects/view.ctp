<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResProject $resProject
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Res Project'), ['action' => 'edit', $resProject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Res Project'), ['action' => 'delete', $resProject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resProject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Res Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Res Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Res Project Participants'), ['controller' => 'ResProjectParticipants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Res Project Participant'), ['controller' => 'ResProjectParticipants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="resProjects view large-9 medium-8 columns content">
    <h3><?= h($resProject->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($resProject->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($resProject->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scheduling') ?></th>
            <td><?= h($resProject->scheduling) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsor Link') ?></th>
            <td><?= h($resProject->sponsor_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($resProject->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Res Project Participants') ?></h4>
        <?php if (!empty($resProject->res_project_participants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Res Project Id') ?></th>
                <th scope="col"><?= __('Participant') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($resProject->res_project_participants as $resProjectParticipants): ?>
            <tr>
                <td><?= h($resProjectParticipants->res_project_id) ?></td>
                <td><?= h($resProjectParticipants->participant) ?></td>
                <td><?= h($resProjectParticipants->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ResProjectParticipants', 'action' => 'view', $resProjectParticipants->res_project_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ResProjectParticipants', 'action' => 'edit', $resProjectParticipants->res_project_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ResProjectParticipants', 'action' => 'delete', $resProjectParticipants->res_project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $resProjectParticipants->res_project_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
