<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPastPhd $pplPastPhd
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pplPastPhd, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>']]) ?>
        <fieldset>
            <legend><?= __('Edit Past PhD Student') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('lastname', ['class' => 'form-control']);
                echo $this->Form->control('thesis_date', ['class' => 'form-control']);
                echo $this->Form->control('thesis_name', ['class' => 'form-control']);
                echo $this->Form->control('thesis_link', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
