<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColInstitution $colInstitution
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $colInstitution->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $colInstitution->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Col Institutions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="colInstitutions form large-9 medium-8 columns content">
    <?= $this->Form->create($colInstitution) ?>
    <fieldset>
        <legend><?= __('Edit Col Institution') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
