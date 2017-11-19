<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubConference $pubConference
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pubConference, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>']]) ?>
        <fieldset>
            <legend><?= __('Add Conference') ?></legend>
            <?php
                echo $this->Form->control('author');
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('date', ['class' => 'form-control']);
                echo $this->Form->control('city', ['class' => 'form-control']);
                echo $this->Form->control('country', ['class' => 'form-control']);
                echo $this->Form->control('link', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
