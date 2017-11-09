<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResProjectParticipant $resProjectParticipant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Res Project Participant'), ['action' => 'edit', $resProjectParticipant->res_project_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Res Project Participant'), ['action' => 'delete', $resProjectParticipant->res_project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $resProjectParticipant->res_project_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Res Project Participants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Res Project Participant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Res Projects'), ['controller' => 'ResProjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Res Project'), ['controller' => 'ResProjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="resProjectParticipants view large-9 medium-8 columns content">
    <h3><?= h($resProjectParticipant->res_project_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Res Project') ?></th>
            <td><?= $resProjectParticipant->has('res_project') ? $this->Html->link($resProjectParticipant->res_project->name, ['controller' => 'ResProjects', 'action' => 'view', $resProjectParticipant->res_project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participant') ?></th>
            <td><?= h($resProjectParticipant->participant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($resProjectParticipant->link) ?></td>
        </tr>
    </table>
</div>
