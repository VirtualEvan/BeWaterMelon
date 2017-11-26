<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPastPhd $pplPastPhd
 */
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pplPastPhd, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' =>'edit']) ?>
        <fieldset>
            <legend><?= __('Edit Past PhD Student') ?></legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('lastname', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('thesis_date', ['class' => 'form-control', 'pattern' => '[0-9]{4}']);
                echo $this->Form->control('thesis_name', ['class' => 'form-control', 'pattern' => '.{6,60}']);
                echo $this->Form->control('thesis_link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
