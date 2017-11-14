<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubBook $pubBook
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pub Books'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pubBooks form large-9 medium-8 columns content">
    <?= $this->Form->create($pubBook) ?>
    <fieldset>
        <legend><?= __('Add Pub Book') ?></legend>
        <?php
            echo $this->Form->control('book_name');
            echo $this->Form->control('author');
            echo $this->Form->control('editorial');
            echo $this->Form->control('year');
            echo $this->Form->control('country');
            echo $this->Form->control('isbn');
            echo $this->Form->control('link');
            echo $this->Form->control('physical_identifier');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
