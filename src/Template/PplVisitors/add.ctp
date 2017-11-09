<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplVisitor $pplVisitor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ppl Visitors'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pplVisitors form large-9 medium-8 columns content">
    <?= $this->Form->create($pplVisitor) ?>
    <fieldset>
        <legend><?= __('Add Ppl Visitor') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('lastname');
            echo $this->Form->control('link');
            echo $this->Form->control('doctor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
