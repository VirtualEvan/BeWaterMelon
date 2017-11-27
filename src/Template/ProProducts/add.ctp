<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProProduct $proProduct
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($proProduct, ['enctype' => 'multipart/form-data', 'templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'add']) ?>
        <fieldset>
            <legend><?= __('Add Product') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9 ]{3,100}']);
                echo $this->Form->control('description', ['type' => 'textarea', 'rows' => '3', 'class' => 'form-control', 'pattern' => '.{3,500}']);
                echo $this->Form->control('detailed_description', ['type' => 'textarea', 'rows' => '7', 'class' => 'form-control', 'pattern' => '.{3,5000}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->input('upload', ['class' => 'form-control', 'type' => 'file', 'enctype' => 'multipart/form-data']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
