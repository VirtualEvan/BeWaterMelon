<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActConference $actConference
 */
?>
<div class="container">
    <?= $this->Form->create($actConference, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Edit Conference') ?></legend>
            <?php
                echo $this->Form->control('acronym', ['class' => 'form-control']);
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,100}']);
            ?>
            <?= $this->Form->button(null, ['escape' => true, 'class' => 'btn btn-info btn-sm fa fa-plus add_field_button ml-3']) ?>
            <div class="input_fields_wrap col-md-12 row m-0 p-0">
                <?= $this->Form->control('act_conference_years.0.year', ['class' => 'form-control', 'type' => 'text', 'pattern' => '[0-9]{4}']) ?>
                <?= $this->Form->control('act_conference_years.0.link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']) ?>
                <?php unset($actConference->act_conference_years[0]); ?>

                <?php foreach ($actConference->act_conference_years as $key => $conferenceYears) {
                    echo $this->Form->control('act_conference_years.'.$key.'.year', ['label' => false, 'class' => 'form-control', 'type' => 'text', 'templates' => ['inputContainer' => '<div class="col-md-6 to_rem_'.$key.'"><div class="form-group" >{{content}}</div></div>'], 'pattern' => '[0-9]{4}']);

                    echo $this->Form->control('act_conference_years.'.$key.'.link', ['label' => false, 'class' => 'form-control', 'templates' => ['inputContainer' => '<div class="col-md-6 to_rem_'.$key.'"><div class="input-group">{{content}}<div class="input-group-btn"><button id='.$key.' class="btn btn-info btn-sm remove_field"><div class="fa fa-minus"></div></div></div></div>'], 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                }
                ?>
            </div>


        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
    <?php end($actConference->act_conference_years) ?>
    var x = <?= key($actConference->act_conference_years)+1 ?>;
</script>

<?= $this->Html->script('dynamic-inputs-conferences.js') ?>
