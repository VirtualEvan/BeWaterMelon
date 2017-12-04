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
    <?= $this->Form->create($pubJournal, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'edit']) ?>
        <div class="row">
            <legend><?= __('Edit Journal') ?></legend>
            <?php
            echo $this->Form->input('author', ['class' => 'selectpicker form-control', 'data-live-search' => 'true', 'data-live-search-placeholder' =>'Search', 'multiple' => 'multiple','type' => 'select','options' => $aut]);
            echo $this->Form->control('publication_name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9 ]{3,200}']);
            echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9 ]{3,100}']);
            echo $this->Form->control('location', ['class' => 'form-control', 'pattern' => '.{3,40}']);
            echo $this->Form->control('publication_date', ['class' => 'form-control', 'pattern' => '[0-9]{4}', 'label' => __('Year').' ('.__('yyyy').')']);
            echo $this->Form->control('online_issn', ['class' => 'form-control', 'pattern' => '[0-9]{4}-[0-9]{4}', 'label' => __('Online ISSN').' ('.__('xxxx-xxxx').')']);
            echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
            echo $this->Form->control('print_issn', ['class' => 'form-control', 'pattern' => '[0-9]{4}-[0-9]{4}', 'label' => __('Print ISSN').' ('.__('xxxx-xxxx').')']);
            ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>

<?= $this->Html->css('bootstrap-select.css') ?>
<?= $this->Html->script('bootstrap.bundle.min.js') ?>
<?= $this->Html->script('bootstrap-select.js') ?>
