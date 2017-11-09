<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProProduct $proProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $proProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $proProduct->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pro Products'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="proProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($proProduct) ?>
    <fieldset>
        <legend><?= __('Edit Pro Product') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('link');
            echo $this->Form->control('detailed_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
