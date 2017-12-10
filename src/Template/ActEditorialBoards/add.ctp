<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActEditorialBoard $actEditorialBoard
 */
?>
<div class="container">
    <?= $this->Form->create($actEditorialBoard, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'add']) ?>
    <div class="row">
        <legend><?= __('Add Editorial Board') ?></legend>
        <?php
            echo $this->Form->control('journal_name', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,100}']);
            echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
            echo $this->Form->control('online_issn', ['label' => __('Online ISSN') . ' (' . __('xxxx-xxxx') . ')','class' => 'form-control', 'pattern' =>'[0-9]{4}-[0-9]{3}[0-9X]{1}']);
            echo $this->Form->control('online_issn_year', ['label' => __('Online ISSN Year') . ' (' . __('yyyy') . ')', 'class' => 'form-control', 'pattern' =>'[0-9]{4}']);
            echo $this->Form->control('h_index', ['label' => __('H-Index') . ' (' . __('xx') . ')', 'class' => 'form-control', 'pattern' =>'[0-9]{2}']);
            echo $this->Form->control('sjr', ['label' => __('SJR') . ' (' . __('x.xxx') . ')', 'type' => 'text', 'class' => 'form-control', 'pattern' =>'[0-9]\.[0-9]{3}']);
            echo $this->Form->control('sjr_year', ['label' => __('SJR Year') . ' (' . __('yyyy') . ')', 'class' => 'form-control', 'pattern' =>'[0-9]{4}']);
            echo $this->Form->control('sjr_quartile', ['label' => __('SJR Quartile'), 'class' => 'form-control', 'pattern' =>'[1234]{1}']);
            echo $this->Form->control('print_issn', ['label' => __('Print ISSN') . ' (' . __('xxxx-xxxx') . ')', 'class' => 'form-control', 'pattern' =>'[0-9]{4}-[0-9]{3}[0-9X]{1}']);
            echo $this->Form->control('impact_factor', ['label' => __('Impact factor') . ' (' . __('x.xxx') . ')', 'type' => 'text', 'class' => 'form-control', 'pattern' =>'[0-9]\.[0-9]{3}']);
            echo $this->Form->control('impact_factor_quartile', ['class' => 'form-control', 'pattern' =>'[1234]{1}']);
            echo $this->Form->control('impact_factor_year', ['label' => __('Impact Factor Year') . ' (' . __('yyyy') . ')', 'class' => 'form-control', 'pattern' =>'[0-9]{4}']);
        ?>
    </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
