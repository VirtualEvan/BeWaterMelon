<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPostdoc $pplPostdoc
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pplPostdoc, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>']]) ?>
        <fieldset>
            <legend><?= __('Add Postdoc') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('lastname', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
