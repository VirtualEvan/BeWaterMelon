<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser $pplUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pplUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pplUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ppl Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cou Subjects'), ['controller' => 'CouSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cou Subject'), ['controller' => 'CouSubjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pplUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($pplUser) ?>
    <fieldset>
        <legend><?= __('Edit Ppl User') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('lastname');
            echo $this->Form->control('rol');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('bio');
            echo $this->Form->control('password');
            echo $this->Form->control('fax');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
