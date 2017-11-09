<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPastPhd $pplPastPhd
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ppl Past Phds'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pplPastPhds form large-9 medium-8 columns content">
    <?= $this->Form->create($pplPastPhd) ?>
    <fieldset>
        <legend><?= __('Add Ppl Past Phd') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('lastname');
            echo $this->Form->control('thesis_date');
            echo $this->Form->control('thesis_name');
            echo $this->Form->control('thesis_link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
