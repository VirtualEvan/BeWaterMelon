<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActConference $actConference
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Act Conferences'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Act Conference Years'), ['controller' => 'ActConferenceYears', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Act Conference Year'), ['controller' => 'ActConferenceYears', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="actConferences form large-9 medium-8 columns content">
    <?= $this->Form->create($actConference) ?>
    <fieldset>
        <legend><?= __('Add Act Conference') ?></legend>
        <?php
            echo $this->Form->control('acronym');
            echo $this->Form->control('name');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
