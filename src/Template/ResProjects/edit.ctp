<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResProject $resProject
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resProject->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resProject->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Res Projects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Res Project Participants'), ['controller' => 'ResProjectParticipants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Res Project Participant'), ['controller' => 'ResProjectParticipants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resProjects form large-9 medium-8 columns content">
    <?= $this->Form->create($resProject) ?>
    <fieldset>
        <legend><?= __('Edit Res Project') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('code');
            echo $this->Form->control('scheduling');
            echo $this->Form->control('sponsor_link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
