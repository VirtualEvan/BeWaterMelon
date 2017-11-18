<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplVisitor $pplVisitor
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pplVisitor, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>']]) ?>
        <fieldset>
            <legend><?= __('Edit Visitor') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('lastname', ['class' => 'form-control']);
                echo $this->Form->control('link', ['class' => 'form-control']);
                echo $this->Form->control('doctor', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
