<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouSubject $couSubject
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cou Subjects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ppl Users'), ['controller' => 'PplUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ppl User'), ['controller' => 'PplUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cou Course Degree Subjects'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cou Course Degree Subject'), ['controller' => 'CouCourseDegreeSubjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="couSubjects form large-9 medium-8 columns content">
    <?= $this->Form->create($couSubject) ?>
    <fieldset>
        <legend><?= __('Add Cou Subject') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('ppl_user_id', ['options' => $pplUsers]);
            echo $this->Form->control('abbreviation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
