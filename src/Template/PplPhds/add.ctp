<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPhd $pplPhd
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pplPhd, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'add']) ?>
        <fieldset>
            <legend><?= __('Add PhD') ?></legend>
            <?php
                echo $this->Html->div(null,$this->Form->input('upload', ['class' => 'form-control', 'type' => 'file', 'enctype' => 'multipart/form-data']));
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('lastname', ['class' => 'form-control']);
                echo $this->Form->control('thesis_name', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
