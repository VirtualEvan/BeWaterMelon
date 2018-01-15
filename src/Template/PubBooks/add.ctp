<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubBook $pubBook
 */
$aut = array();
 foreach ($pplUsers as $pplUser) {
     $aut[$pplUser->id] = $pplUser->name . ' ' . $pplUser->lastname;
 }
?>
<div class="contanier">
    <?= $this->Form->create($pubBook, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Add Book') ?></legend>
            <?php
                echo $this->Form->control('book_name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9 ]{3,100}']);
                echo $this->Form->input('pplUser', ['label' => __('Authors'), 'class' => 'selectpicker form-control', 'data-live-search' => 'true', 'data-live-search-placeholder' =>'Search', 'multiple' => 'multiple','type' => 'select','options' => $aut]);
                echo $this->Form->control('editorial', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,100}']);
                echo $this->Form->control('year', ['class' => 'form-control', 'pattern' => '[0-9]{4}', 'label' => __('Year').' ('.__('yyyy').')']);
                echo $this->Form->control('country', ['label'=> __('Country'), 'class' => 'form-control', 'pattern' => '[A-Za-z ]{3,45}']);
                echo $this->Form->control('isbn', ['class' => 'form-control', 'pattern' => '[0-9\-]{17}', 'label' => __('ISBN').' ('.__('Ex: xxx-x-xxx-xxxxx-x').')']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->control('physical_identifier', ['class' => 'form-control', 'pattern' => '[0-9]{8}', 'label' => __('Physical Identifier').' ('.__('8 num.').')']);
            ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>

<?= $this->Html->css('bootstrap-select.css') ?>
<?= $this->Html->script('bootstrap.bundle.min.js') ?>
<?= $this->Html->script('bootstrap-select.js') ?>
