<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColGroup $colGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $colGroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $colGroup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Col Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="colGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($colGroup) ?>
    <fieldset>
        <legend><?= __('Edit Col Group') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('department');
            echo $this->Form->control('company');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
