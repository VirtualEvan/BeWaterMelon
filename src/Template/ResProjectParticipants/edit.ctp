<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResProjectParticipant $resProjectParticipant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resProjectParticipant->res_project_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resProjectParticipant->res_project_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Project Participants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'ResProjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'ResProjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resProjectParticipants form large-9 medium-8 columns content">
    <?= $this->Form->create($resProjectParticipant) ?>
    <fieldset>
        <legend><?= __('Edit Project Participant') ?></legend>
        <?php
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
