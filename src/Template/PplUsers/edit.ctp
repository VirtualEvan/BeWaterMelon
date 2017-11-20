<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser $pplUser
 */
?>

<div class="container">
    <div class="row">
        <?= $this->Form->create($pplUser, ['enctype' => 'multipart/form-data', 'templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'edit']) ?>
        <fieldset>
            <legend><?= __('Edit User') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('lastname', ['class' => 'form-control', 'pattern' => '.{3,20}']);
                echo $this->Form->input('rol', ['class' => 'form-control', 'default' => $pplUser->rol, 'options' => ['admin' => 'Admin', 'reg' => 'Registered']]);
                echo $this->Form->control('email', ['class' => 'form-control']);
                echo $this->Form->control('phone', ['class' => 'form-control', 'pattern' => '[0-9]{9}']);
                echo $this->Form->control('bio', ['class' => 'form-control']);
                echo $this->Form->control('password', ['class' => 'form-control', 'pattern' => '.{6,40}']);
                echo $this->Form->control('fax', ['class' => 'form-control', 'pattern' => '[0-9]{9}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->input('upload', ['class' => 'form-control', 'type' => 'file', 'enctype' => 'multipart/form-data', 'type' => 'file', 'enctype' => 'multipart/form-data']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
