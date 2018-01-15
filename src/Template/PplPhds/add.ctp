<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPhd $pplPhd
 */
?>
<div class="container">
    <?= $this->Form->create($pplPhd, ['enctype' => 'multipart/form-data', 'templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Add PhD') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('lastname', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('thesis_name', ['label'=> __('Thesis name'), 'class' => 'form-control', 'pattern' => '.{6,60}']);
                echo $this->Form->input('upload', ['label' => __('Image'), 'class' => 'form-control', 'type' => 'file', 'enctype' => 'multipart/form-data']);
            ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
