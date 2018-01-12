<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouDegree $couDegree
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Degrees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Course Degree Subjects'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course Degree Subject'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="couDegrees form large-9 medium-8 columns content">
    <?= $this->Form->create($couDegree) ?>
    <fieldset>
        <legend><?= __('Add Degree') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
