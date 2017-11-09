<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubConference $pubConference
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pub Conferences'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pubConferences form large-9 medium-8 columns content">
    <?= $this->Form->create($pubConference) ?>
    <fieldset>
        <legend><?= __('Add Pub Conference') ?></legend>
        <?php
            echo $this->Form->control('author');
            echo $this->Form->control('name');
            echo $this->Form->control('date');
            echo $this->Form->control('city');
            echo $this->Form->control('country');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
