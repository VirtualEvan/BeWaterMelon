<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouCourseDegreeSubject[]|\Cake\Collection\CollectionInterface $couCourseDegreeSubjects
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Course Degree Subject'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Degrees'), ['controller' => 'CouDegrees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Degree'), ['controller' => 'CouDegrees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'CouSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'CouSubjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="couCourseDegreeSubjects index large-9 medium-8 columns content">
    <h3><?= __('Course Degree Subjects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cou_degree_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cou_subject_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($couCourseDegreeSubjects as $couCourseDegreeSubject): ?>
            <tr>
                <td><?= $couCourseDegreeSubject->has('cou_degree') ? $this->Html->link($couCourseDegreeSubject->cou_degree->name, ['controller' => 'CouDegrees', 'action' => 'view', $couCourseDegreeSubject->cou_degree->id]) : '' ?></td>
                <td><?= $couCourseDegreeSubject->has('cou_subject') ? $this->Html->link($couCourseDegreeSubject->cou_subject->name, ['controller' => 'CouSubjects', 'action' => 'view', $couCourseDegreeSubject->cou_subject->id]) : '' ?></td>
                <td><?= h($couCourseDegreeSubject->year) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $couCourseDegreeSubject->cou_degree_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $couCourseDegreeSubject->cou_degree_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $couCourseDegreeSubject->cou_degree_id], ['confirm' => __('Are you sure you want to delete # {0}?', $couCourseDegreeSubject->cou_degree_id)]) ?>
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
