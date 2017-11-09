<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplCollaborator[]|\Cake\Collection\CollectionInterface $pplCollaborators
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ppl Collaborator'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pplCollaborators index large-9 medium-8 columns content">
    <h3><?= __('Ppl Collaborators') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pplCollaborators as $pplCollaborator): ?>
            <tr>
                <td><?= $this->Number->format($pplCollaborator->id) ?></td>
                <td><?= h($pplCollaborator->name) ?></td>
                <td><?= h($pplCollaborator->lastname) ?></td>
                <td><?= h($pplCollaborator->doctor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pplCollaborator->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pplCollaborator->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pplCollaborator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplCollaborator->id)]) ?>
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
