<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubBook $pubBook
 */

 foreach ($authors as $author) {
     $aut[$author->id] = $author->name . ' ' . $author->lastname;
 }
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pubBook, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>']]) ?>
        <fieldset>
            <legend><?= __('Edit Book') ?></legend>
            <?php
                echo $this->Form->control('book_name', ['class' => 'form-control']);
                echo $this->Form->input('author', ['class' => 'selectpicker form-control', 'data-live-search' => 'true', 'data-live-search-placeholder' =>'Search', 'multiple' => 'multiple','type' => 'select','options' => $aut]);
                echo $this->Form->control('editorial', ['class' => 'form-control']);
                echo $this->Form->control('year', ['class' => 'form-control']);
                echo $this->Form->control('country', ['class' => 'form-control']);
                echo $this->Form->control('isbn', ['class' => 'form-control']);
                echo $this->Form->control('link', ['class' => 'form-control']);
                echo $this->Form->control('physical_identifier', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<?= $this->Html->css('bootstrap-select.css') ?>
<?= $this->Html->script('bootstrap.bundle.min.js') ?>
<?= $this->Html->script('bootstrap-select.js') ?>
