<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser $pplUser
 */
?>

<div class="container">
    <?= $this->Form->create($pplUser, ['enctype' => 'multipart/form-data', 'templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Add User') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,20}']);
                echo $this->Form->control('lastname', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,20}']);
                echo $this->Form->input('rol', ['class' => 'form-control', 'options' => ['admin' => 'Admin', 'reg' => 'Registered']]);
                echo $this->Form->control('email', ['class' => 'form-control']);
                echo $this->Form->control('phone', ['class' => 'form-control', 'pattern' => '[0-9]{9}']);
                echo $this->Form->control('bio', ['class' => 'form-control']);
                echo $this->Form->control('password', ['class' => 'form-control', 'pattern' => '.{6,40}']);
                echo $this->Form->control('fax', ['class' => 'form-control', 'pattern' => '[0-9]{9}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->input('upload', ['label' => __('Image'), 'class' => 'form-control', 'type' => 'file', 'enctype' => 'multipart/form-data']);
            ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
