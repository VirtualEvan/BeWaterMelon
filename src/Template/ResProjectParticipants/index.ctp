<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResProjectParticipant[]|\Cake\Collection\CollectionInterface $resProjectParticipants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Project Participant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'ResProjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'ResProjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resProjectParticipants index large-9 medium-8 columns content">
    <h3><?= __('Project Participants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('res_project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('participant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resProjectParticipants as $resProjectParticipant): ?>
            <tr>
                <td><?= $resProjectParticipant->has('res_project') ? $this->Html->link($resProjectParticipant->res_project->name, ['controller' => 'ResProjects', 'action' => 'view', $resProjectParticipant->res_project->id]) : '' ?></td>
                <td><?= h($resProjectParticipant->participant) ?></td>
                <td><?= h($resProjectParticipant->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $resProjectParticipant->res_project_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resProjectParticipant->res_project_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resProjectParticipant->res_project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $resProjectParticipant->res_project_id)]) ?>
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
