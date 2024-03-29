<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouCourseDegreeSubject $couCourseDegreeSubject
 */

$subj = array();

 foreach ($subjects as $subject) {
     $subj[$subject->id] = $subject->name;
 }
?>

<div class="container">
    <?= $this->Form->create($couCourseDegreeSubject, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
        <div class="row">
            <legend><?= __('Add Degree') ?></legend>
            <?php
                echo $this->Form->control('cou_degree.name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9áéíóúüñ ]{3,100}']);
                echo $this->Form->control('cou_degree.link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->input('cou_subject_id', ['class' => 'selectpicker form-control', 'data-live-search' => 'true', 'label' => 'Subjects', 'data-live-search-placeholder' =>'Search', 'multiple' => 'multiple','type' => 'select','options' => $subj]);
                echo $this->Form->control('year', ['label' => __('Year') . ' (' . __('yyyy') . ')', 'class' => 'form-control', 'type' => 'text', 'pattern' => '[0-9]{4}']);
            ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>

<?= $this->Html->css('bootstrap-select.css') ?>
<?= $this->Html->script('bootstrap.bundle.min.js') ?>
<?= $this->Html->script('bootstrap-select.js') ?>
