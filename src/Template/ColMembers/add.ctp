<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColMember $colMember
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Col Members'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="colMembers form large-9 medium-8 columns content">
    <?= $this->Form->create($colMember) ?>
    <fieldset>
        <legend><?= __('Add Col Member') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
