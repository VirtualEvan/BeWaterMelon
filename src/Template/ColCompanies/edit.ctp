<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColCompany $colCompany
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $colCompany->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $colCompany->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Col Companies'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="colCompanies form large-9 medium-8 columns content">
    <?= $this->Form->create($colCompany) ?>
    <fieldset>
        <legend><?= __('Edit Col Company') ?></legend>
        <?php
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
