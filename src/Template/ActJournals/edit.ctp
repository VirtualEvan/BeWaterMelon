<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActJournal $actJournal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $actJournal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $actJournal->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Act Journals'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="actJournals form large-9 medium-8 columns content">
    <?= $this->Form->create($actJournal) ?>
    <fieldset>
        <legend><?= __('Edit Act Journal') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('link');
            echo $this->Form->control('online_issn');
            echo $this->Form->control('online_issn_year');
            echo $this->Form->control('impacr_factor');
            echo $this->Form->control('impact_factor_quartile');
            echo $this->Form->control('impact_factor_year');
            echo $this->Form->control('print_issn');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
