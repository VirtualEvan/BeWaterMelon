<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouCourseDegreeSubject $couCourseDegreeSubject
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $couCourseDegreeSubject->cou_degree_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $couCourseDegreeSubject->cou_degree_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cou Course Degree Subjects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cou Degrees'), ['controller' => 'CouDegrees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cou Degree'), ['controller' => 'CouDegrees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cou Subjects'), ['controller' => 'CouSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cou Subject'), ['controller' => 'CouSubjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="couCourseDegreeSubjects form large-9 medium-8 columns content">
    <?= $this->Form->create($couCourseDegreeSubject) ?>
    <fieldset>
        <legend><?= __('Edit Cou Course Degree Subject') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
