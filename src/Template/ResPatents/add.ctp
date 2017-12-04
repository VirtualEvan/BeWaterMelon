<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResPatent $resPatent
 */
?>

<div class="container">
    <?= $this->Form->create($resPatent, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Add Patent') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9 ]{3,200}']);
                echo $this->Form->control('code', ['class' => 'form-control', 'pattern' => 'P[0-9]{9}', 'label' => __('Code').' ('.__('Pxxxxxxxxx').')']);
                echo $this->Form->control('year', ['class' => 'form-control', 'pattern' => '[0-9]{4}', 'label' => __('Year').' ('.__('yyyy').')']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
            ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
