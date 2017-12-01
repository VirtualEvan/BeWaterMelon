<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResPatent $resPatent
 */
?>

<div class="container">
    <div class="row">
        <?= $this->Form->create($resPatent, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'add']) ?>
        <fieldset>
            <legend><?= __('Add Patent') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9 ]{3,200}']);
                echo $this->Form->control('code', ['class' => 'form-control', 'pattern' => 'P[0-9]{9}']);
                echo $this->Form->control('year', ['class' => 'form-control', 'pattern' => '[0-9]{4}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
