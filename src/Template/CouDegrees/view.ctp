<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouDegree $couDegree
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cou Degree'), ['action' => 'edit', $couDegree->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cou Degree'), ['action' => 'delete', $couDegree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couDegree->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cou Degrees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cou Degree'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cou Course Degree Subjects'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cou Course Degree Subject'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="couDegrees view large-9 medium-8 columns content">
    <h3><?= h($couDegree->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($couDegree->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($couDegree->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($couDegree->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cou Course Degree Subjects') ?></h4>
        <?php if (!empty($couDegree->cou_course_degree_subjects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Cou Degree Id') ?></th>
                <th scope="col"><?= __('Cou Subject Id') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($couDegree->cou_course_degree_subjects as $couCourseDegreeSubjects): ?>
            <tr>
                <td><?= h($couCourseDegreeSubjects->cou_degree_id) ?></td>
                <td><?= h($couCourseDegreeSubjects->cou_subject_id) ?></td>
                <td><?= h($couCourseDegreeSubjects->year) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'view', $couCourseDegreeSubjects->cou_degree_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'edit', $couCourseDegreeSubjects->cou_degree_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'delete', $couCourseDegreeSubjects->cou_degree_id], ['confirm' => __('Are you sure you want to delete # {0}?', $couCourseDegreeSubjects->cou_degree_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
