<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColMember $colMember
 */
?>
<div class="container">
    <?= $this->Form->create($colMember, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'edit']) ?>
        <div class="row">
            <legend><?= __('Edit Member') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9áéíóúüñ ]{3,45}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->input('upload', ['label' => __('Image'), 'class' => 'form-control', 'type' => 'file', 'enctype' => 'multipart/form-data']);
            ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
