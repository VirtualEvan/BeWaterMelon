<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouSubject[]|\Cake\Collection\CollectionInterface $couSubjects
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cou Subject'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ppl Users'), ['controller' => 'PplUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ppl User'), ['controller' => 'PplUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cou Course Degree Subjects'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cou Course Degree Subject'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="couSubjects index large-9 medium-8 columns content">
    <h3><?= __('Cou Subjects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ppl_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('abbreviation') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($couSubjects as $couSubject): ?>
            <tr>
                <td><?= $this->Number->format($couSubject->id) ?></td>
                <td><?= h($couSubject->name) ?></td>
                <td><?= $couSubject->has('ppl_user') ? $this->Html->link($couSubject->ppl_user->name, ['controller' => 'PplUsers', 'action' => 'view', $couSubject->ppl_user->id]) : '' ?></td>
                <td><?= h($couSubject->abbreviation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $couSubject->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $couSubject->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $couSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couSubject->id)]) ?>
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
