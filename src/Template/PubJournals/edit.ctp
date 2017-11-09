<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal $pubJournal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pubJournal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pubJournal->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pub Journals'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pubJournals form large-9 medium-8 columns content">
    <?= $this->Form->create($pubJournal) ?>
    <fieldset>
        <legend><?= __('Edit Pub Journal') ?></legend>
        <?php
            echo $this->Form->control('author');
            echo $this->Form->control('publication_name');
            echo $this->Form->control('name');
            echo $this->Form->control('location');
            echo $this->Form->control('publication_date');
            echo $this->Form->control('online_issn');
            echo $this->Form->control('link');
            echo $this->Form->control('print_issn');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
