<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPhd $pplPhd
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ppl Phds'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pplPhds form large-9 medium-8 columns content">
    <?= $this->Form->create($pplPhd, ['name' => 'add']) ?>
    <fieldset>
        <legend><?= __('Add Ppl Phd') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('lastname');
            echo $this->Form->control('thesis_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
