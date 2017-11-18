<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplCollaborator $pplCollaborator
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pplCollaborator, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>']]) ?>
        <fieldset>
            <legend><?= __('Edit Collaborator') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('lastname', ['class' => 'form-control']);
                echo $this->Form->control('doctor', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
