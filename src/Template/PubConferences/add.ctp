<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubConference $pubConference
 */
$aut = array();
 foreach ($pplUsers as $pplUser) {
     $aut[$pplUser->id] = $pplUser->name . ' ' . $pplUser->lastname;
 }
 ?>
<div class="container">
    <?= $this->Form->create($pubConference, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Add Conference') ?></legend>
            <?php
                echo $this->Form->input('pplUser', ['label' => __('Authors'), 'class' => 'selectpicker form-control', 'data-live-search' => 'true', 'data-live-search-placeholder' =>'Search', 'multiple' => 'multiple','type' => 'select','options' => $aut]);
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9áéíóúüñ ]{3,200}']);
                ?>
                <div class="col-md-6">
                    <div class="form-group" >
                        <label for="date"> <?= __('Date') ?> (<?= __('yyyy/mm/dd') ?>) </label>
                        <input type="date" name="date" class="form-control">
                    </div>
                </div>
                <?php
                echo $this->Form->control('city', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,45}']);
                echo $this->Form->control('country', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,45}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
            ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>

<?= $this->Html->css('bootstrap-select.css') ?>
<?= $this->Html->script('bootstrap.bundle.min.js') ?>
<?= $this->Html->script('bootstrap-select.js') ?>
