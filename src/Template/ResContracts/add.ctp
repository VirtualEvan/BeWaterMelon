<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResContract $resContract
 */
?>
<div class="container">
    <?= $this->Form->create($resContract, ['enctype' => 'multipart/form-data', 'templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Add Contract') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,20}']);
                echo $this->Form->control('code', ['class' => 'form-control']);
            ?>

            <?= $this->Form->button(null, ['escape' => true, 'class' => 'btn btn-info btn-sm fa fa-plus add_field_button ml-3']) ?>
            <div class="input_fields_wrap col-md-12 row m-0 p-0">
                <?= $this->Form->control('res_contract_participants.0.participant', ['class' => 'form-control', 'type' => 'text', 'pattern' => '[A-Za-záéíóúüñ ]{3,20}']) ?>
                <?= $this->Form->control('res_contract_participants.0.link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']) ?>
            </div>

            <?php
                echo $this->Form->control('scheduling', ['class' => 'form-control', 'pattern' => '[0-9]{4}', 'label' => __('Scheduling').' ('.__('yyyy').')']);
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

<?= $this->Html->script('dynamic-inputs-contracts.js') ?>
