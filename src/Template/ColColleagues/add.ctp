<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColColleague $colColleague
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Col Colleagues'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="colColleagues form large-9 medium-8 columns content">
    <?= $this->Form->create($colColleague) ?>
    <fieldset>
        <legend><?= __('Add Col Colleague') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('doctor');
            echo $this->Form->control('department');
            echo $this->Form->control('position');
            echo $this->Form->control('company');
            echo $this->Form->control('email');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
