<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPastPhd $pplPastPhd
 */
?>
<div class="container">
        <?= $this->Form->create($pplPastPhd, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' =>'add']) ?>
            <div class="row">
            <legend><?= __('Add Past PhD Student') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('lastname', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('thesis_date', ['label' => __('Thesis Date') . ' (' . __('yyyy') . ')', 'class' => 'form-control', 'pattern' => '[0-9]{4}']);
                echo $this->Form->control('thesis_name', ['class' => 'form-control', 'pattern' => '.{6,60}']);
                echo $this->Form->control('thesis_link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
            ?>
    </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
</div>
