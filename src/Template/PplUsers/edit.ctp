<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser $pplUser
 */
?>

<div class="container">
    <div class="row">
        <?= $this->Form->create($pplUser, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>']]) ?>
        <fieldset>
            <legend><?= __('Edit User') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('lastname', ['class' => 'form-control']);
                echo $this->Form->input('rol', ['class' => 'form-control', 'default' => $pplUser->rol, 'options' => ['admin' => 'Admin', 'reg' => 'Registered']]);
                echo $this->Form->control('email', ['class' => 'form-control']);
                echo $this->Form->control('phone', ['class' => 'form-control']);
                echo $this->Form->control('bio', ['class' => 'form-control']);
                echo $this->Form->control('password', ['class' => 'form-control']);
                echo $this->Form->control('fax', ['class' => 'form-control']);
                echo $this->Form->control('link', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
