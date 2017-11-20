<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubConference $pubConference
 */

 foreach ($authors as $author) {
     $aut[$author->id] = $author->name . ' ' . $author->lastname;
 }
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pubConference, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'edit']) ?>
        <fieldset>
            <legend><?= __('Edit Conference') ?></legend>
            <?php
                echo $this->Form->input('author', ['class' => 'selectpicker form-control', 'data-live-search' => 'true', 'data-live-search-placeholder' =>'Search', 'multiple' => 'multiple','type' => 'select','options' => $aut]);
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9 ]{3,200}']);
                echo $this->Form->control('date', ['class' => 'form-control']);
                echo $this->Form->control('city', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,45}']);
                echo $this->Form->control('country', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,45}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<?= $this->Html->css('bootstrap-select.css') ?>
<?= $this->Html->script('bootstrap.bundle.min.js') ?>
<?= $this->Html->script('bootstrap-select.js') ?>
