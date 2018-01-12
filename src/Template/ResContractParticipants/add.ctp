<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResContractParticipant $resContractParticipant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contract Participants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'ResContracts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'ResContracts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resContractParticipants form large-9 medium-8 columns content">
    <?= $this->Form->create($resContractParticipant) ?>
    <fieldset>
        <legend><?= __('Add Contract Participant') ?></legend>
        <?php
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
