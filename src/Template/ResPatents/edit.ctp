<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResPatent $resPatent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resPatent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resPatent->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Res Patents'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="resPatents form large-9 medium-8 columns content">
    <?= $this->Form->create($resPatent) ?>
    <fieldset>
        <legend><?= __('Edit Res Patent') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('code');
            echo $this->Form->control('year');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
