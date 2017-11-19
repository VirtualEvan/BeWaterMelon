<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal $pubJournal
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pubJournal, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>']]) ?>
        <fieldset>
            <legend><?= __('Edit Journal') ?></legend>
            <?php
                echo $this->Form->control('author', ['class' => 'form-control']);
                echo $this->Form->control('publication_name', ['class' => 'form-control']);
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('location', ['class' => 'form-control']);
                echo $this->Form->control('publication_date', ['class' => 'form-control']);
                echo $this->Form->control('online_issn', ['class' => 'form-control']);
                echo $this->Form->control('link', ['class' => 'form-control']);
                echo $this->Form->control('print_issn', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
