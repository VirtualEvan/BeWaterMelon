<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResProject $resProject
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($resProject, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'add']) ?>
        <fieldset>
            <legend><?= __('Add Project') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('code', ['class' => 'form-control']);
                echo $this->Form->control('res_project_participants.0.participant', ['class' => 'form-control', 'type' => 'text']);
                echo $this->Form->control('res_project_participants.0.link', ['class' => 'form-control']);
                echo $this->Form->control('scheduling', ['class' => 'form-control']);
                echo $this->Form->control('sponsor_link', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
