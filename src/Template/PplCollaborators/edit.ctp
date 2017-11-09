<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplCollaborator $pplCollaborator
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pplCollaborator->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pplCollaborator->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ppl Collaborators'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pplCollaborators form large-9 medium-8 columns content">
    <?= $this->Form->create($pplCollaborator) ?>
    <fieldset>
        <legend><?= __('Edit Ppl Collaborator') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('lastname');
            echo $this->Form->control('doctor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
