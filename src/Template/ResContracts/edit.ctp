<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResContract $resContract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resContract->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resContract->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Res Contracts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Res Contract Participants'), ['controller' => 'ResContractParticipants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Res Contract Participant'), ['controller' => 'ResContractParticipants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resContracts form large-9 medium-8 columns content">
    <?= $this->Form->create($resContract) ?>
    <fieldset>
        <legend><?= __('Edit Res Contract') ?></legend>
        <?php
            echo $this->Form->control('code');
            echo $this->Form->control('scheduling');
            echo $this->Form->control('sponsor_link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
