<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouDegree[]|\Cake\Collection\CollectionInterface $couDegrees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Degree'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Course Degree Subjects'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course Degree Subject'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="couDegrees index large-9 medium-8 columns content">
    <h3><?= __('Degrees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($couDegrees as $couDegree): ?>
            <tr>
                <td><?= $this->Number->format($couDegree->id) ?></td>
                <td><?= h($couDegree->name) ?></td>
                <td><?= h($couDegree->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $couDegree->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $couDegree->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $couDegree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couDegree->id)]) ?>
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
