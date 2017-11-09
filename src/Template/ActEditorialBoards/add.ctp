<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActEditorialBoard $actEditorialBoard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Act Editorial Boards'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="actEditorialBoards form large-9 medium-8 columns content">
    <?= $this->Form->create($actEditorialBoard) ?>
    <fieldset>
        <legend><?= __('Add Act Editorial Board') ?></legend>
        <?php
            echo $this->Form->control('journal_name');
            echo $this->Form->control('link');
            echo $this->Form->control('online_issn');
            echo $this->Form->control('online_issn_year');
            echo $this->Form->control('h_index');
            echo $this->Form->control('sjr');
            echo $this->Form->control('sjr_year');
            echo $this->Form->control('sjr_quartile');
            echo $this->Form->control('print_issn');
            echo $this->Form->control('impact_factor');
            echo $this->Form->control('impact_factor_quartile');
            echo $this->Form->control('impact_factor_year');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
