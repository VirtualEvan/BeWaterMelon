<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal $pubJournal
 */

foreach ($authors as $author) {
    $aut[$author->id] = $author->name . ' ' . $author->lastname;
}
$aut[0] = __('Select Authors');
?>

<div class="container">
    <div class="row">
        <?= $this->Form->create($pubJournal, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'add']) ?>
        <fieldset>
            <legend><?= __('Add Journal') ?></legend>
            <?php
                echo $this->Form->input('author', array('multiple' => 'multiple','type' => 'select','options' => $aut));
                echo $this->Form->control('publication_name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9 ]{3,200}']);
                echo $this->Form->control('name', ['class' => 'form-control',  'pattern' => '[A-Za-z0-9 ]{3,200}']);
                echo $this->Form->control('location', ['class' => 'form-control', 'pattern' => '.{3,40}']);
                echo $this->Form->control('publication_date', ['class' => 'form-control', 'pattern' => '[0-9]{4}']);
                echo $this->Form->control('online_issn', ['class' => 'form-control', 'pattern' => '[0-9]{4}-[0-9]{4}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->control('print_issn', ['class' => 'form-control', 'pattern' => '[0-9]{4}-[0-9]{4}']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
