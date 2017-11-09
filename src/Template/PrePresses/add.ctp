<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrePress $prePress
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pre Presses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="prePresses form large-9 medium-8 columns content">
    <?= $this->Form->create($prePress) ?>
    <fieldset>
        <legend><?= __('Add Pre Press') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('date');
            echo $this->Form->control('source');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
