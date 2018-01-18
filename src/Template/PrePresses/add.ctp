<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrePress $prePress
 */
?>

<div class="container">
    <?= $this->Form->create($prePress, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group">{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Add Press') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,100}']);
            ?>
            <div class="col-md-6">
                <div class="form-group" >
                    <label for="date"> <?= __('Date') ?> (<?= __('yyyy/mm/dd') ?>) </label>
                    <input type="date" name="date" class="form-control">
                </div>
            </div>
            <?php
                echo $this->Form->control('source', ['label'=> __('Source'), 'class' => 'form-control', 'pattern' => '[A-Za-z/ ]{3,100}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
            ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
