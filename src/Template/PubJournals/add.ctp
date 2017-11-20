<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal $pubJournal
 */

foreach ($authors as $author) {
    $aut[$author->id] = $author->name . ' ' . $author->lastname;
}
?>

<div class="container">
    <div class="row">
        <?= $this->Form->create($pubJournal, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>']]) ?>
        <fieldset>
            <legend><?= __('Add Journal') ?></legend>
            <?php
                echo $this->Form->input('author', ['class' => 'selectpicker form-control', 'data-live-search' => 'true', 'data-live-search-placeholder' =>'Search', 'multiple' => 'multiple','type' => 'select','options' => $aut]);
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

<?= $this->Html->css('bootstrap-select.css') ?>
<?= $this->Html->script('bootstrap.bundle.min.js') ?>
<?= $this->Html->script('bootstrap-select.js') ?>
