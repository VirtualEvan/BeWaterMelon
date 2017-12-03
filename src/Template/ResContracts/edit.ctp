<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResContract $resContract
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($resContract, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'edit']) ?>
        <fieldset>
            <legend><?= __('Edit Contract') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('code', ['class' => 'form-control']);
                echo $this->Form->control('res_contract_participants.0.participant', ['class' => 'form-control', 'type' => 'text']);
                echo $this->Form->control('res_contract_participants.0.link', ['class' => 'form-control']);
                echo $this->Form->control('scheduling', ['class' => 'form-control']);
                echo $this->Form->control('sponsor_link', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
