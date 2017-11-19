<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser $pplUser
 */
?>

<div class="container">
    <div class="row">
        <?= $this->Form->create($pplUser, ['enctype' => 'multipart/form-data', 'templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>']]) ?>
        <fieldset>
            <legend><?= __('Add User') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('lastname', ['class' => 'form-control']);
                echo $this->Form->input('rol', ['class' => 'form-control', 'options' => ['admin' => 'Admin', 'reg' => 'Registered']]);
                echo $this->Form->control('email', ['class' => 'form-control']);
                echo $this->Form->control('phone', ['class' => 'form-control']);
                echo $this->Form->control('bio', ['class' => 'form-control']);
                echo $this->Form->control('password', ['class' => 'form-control']);
                echo $this->Form->control('fax', ['class' => 'form-control']);
                echo $this->Form->control('link', ['class' => 'form-control']);
                echo $this->Form->input('upload', ['class' => 'form-control', 'type' => 'file', 'enctype' => 'multipart/form-data']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
