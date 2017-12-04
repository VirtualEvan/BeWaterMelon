<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResProject $resProject
 */
?>
<div class="container">
        <?= $this->Form->create($resProject, ['enctype' => 'multipart/form-data', 'templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Add Project') ?></legend>

            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('code', ['class' => 'form-control']);
            ?>

            <?= $this->Form->button(null, ['escape' => true, 'class' => 'btn btn-info btn-sm fa fa-plus add_field_button ml-3']) ?>
            <div class="input_fields_wrap col-md-12 row m-0 p-0">
                <?= $this->Form->control('res_project_participants.0.participant', ['class' => 'form-control', 'type' => 'text', 'pattern' => '[A-Za-z ]{3,20}']) ?>
                <?= $this->Form->control('res_project_participants.0.link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']) ?>
            </div>

            <?php
                $scheduling_help = ' ('.__('yyyy - yyyy').')';
                echo $this->Form->control('scheduling', ['label' =>  __('Scheduling') . $scheduling_help, 'class' => 'form-control', 'pattern' => '[0-9]{4} - [0-9]{4}']);
                echo $this->Form->control('sponsor_link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->input('upload', ['label' => __('Image'), 'class' => 'form-control', 'type' => 'file', 'enctype' => 'multipart/form-data']);
            ?>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
    var x = 1;
</script>

<?= $this->Html->script('dynamic-inputs.js') ?>
