<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouCourseDegreeSubject $couCourseDegreeSubject
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cou Course Degree Subject'), ['action' => 'edit', $couCourseDegreeSubject->cou_degree_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cou Course Degree Subject'), ['action' => 'delete', $couCourseDegreeSubject->cou_degree_id], ['confirm' => __('Are you sure you want to delete # {0}?', $couCourseDegreeSubject->cou_degree_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cou Course Degree Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cou Course Degree Subject'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cou Degrees'), ['controller' => 'CouDegrees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cou Degree'), ['controller' => 'CouDegrees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cou Subjects'), ['controller' => 'CouSubjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cou Subject'), ['controller' => 'CouSubjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="couCourseDegreeSubjects view large-9 medium-8 columns content">
    <h3><?= h($couCourseDegreeSubject->cou_degree_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cou Degree') ?></th>
            <td><?= $couCourseDegreeSubject->has('cou_degree') ? $this->Html->link($couCourseDegreeSubject->cou_degree->name, ['controller' => 'CouDegrees', 'action' => 'view', $couCourseDegreeSubject->cou_degree->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cou Subject') ?></th>
            <td><?= $couCourseDegreeSubject->has('cou_subject') ? $this->Html->link($couCourseDegreeSubject->cou_subject->name, ['controller' => 'CouSubjects', 'action' => 'view', $couCourseDegreeSubject->cou_subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($couCourseDegreeSubject->year) ?></td>
        </tr>
    </table>
</div>
