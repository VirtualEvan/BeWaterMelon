<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColColleague $colColleague
 */
?>
<div class="container">
    <?= $this->Form->create($colColleague, ['enctype' => 'multipart/form-data', 'templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Add Colleague') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9áéíóúüñ ]{3,45}']);
                echo $this->Form->control('department', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9áéíóúüñ ]{3,100}']);
                echo $this->Form->control('position', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9áéíóúüñ ]{3,100}']);
                echo $this->Form->control('company', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9áéíóúüñ ]{3,100}']);
                echo $this->Form->control('email', ['class' => 'form-control']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->input('upload', ['label' => __('Image'), 'class' => 'form-control', 'type' => 'file', 'enctype' => 'multipart/form-data']);
                ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="doctor"> <?= __('Doctor') ?> </label>
                        <?= $this->Form->control('doctor', ['label' => false]) ?>
                    </div>
                </div>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
