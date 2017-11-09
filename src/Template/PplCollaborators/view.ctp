<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplCollaborator $pplCollaborator
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ppl Collaborator'), ['action' => 'edit', $pplCollaborator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ppl Collaborator'), ['action' => 'delete', $pplCollaborator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplCollaborator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ppl Collaborators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ppl Collaborator'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pplCollaborators view large-9 medium-8 columns content">
    <h3><?= h($pplCollaborator->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pplCollaborator->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($pplCollaborator->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= h($pplCollaborator->doctor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pplCollaborator->id) ?></td>
        </tr>
    </table>
</div>
