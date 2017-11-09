<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActConferenceYear $actConferenceYear
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Act Conference Years'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Act Conferences'), ['controller' => 'ActConferences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Act Conference'), ['controller' => 'ActConferences', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="actConferenceYears form large-9 medium-8 columns content">
    <?= $this->Form->create($actConferenceYear) ?>
    <fieldset>
        <legend><?= __('Add Act Conference Year') ?></legend>
        <?php
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
