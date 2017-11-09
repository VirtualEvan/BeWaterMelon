<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPostdoc $pplPostdoc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pplPostdoc->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pplPostdoc->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ppl Postdocs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pplPostdocs form large-9 medium-8 columns content">
    <?= $this->Form->create($pplPostdoc) ?>
    <fieldset>
        <legend><?= __('Edit Ppl Postdoc') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('lastname');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
