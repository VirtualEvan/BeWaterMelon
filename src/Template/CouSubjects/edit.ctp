<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouSubject $couSubject
 */
 ?>
 <div class="container">
     <?= $this->Form->create($couSubject, ['templates' => ['inputContainer' => '<div class="col-md-6"><div class="form-group" >{{content}}</div></div>'], 'name' => 'edit']) ?>
         <div class="row">
             <legend><?= __('Edit Subject') ?></legend>
             <?php

                 echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z0-9 ]{3,100}']);
                 echo $this->Form->control('abbreviation', ['class' => 'form-control', 'pattern' => '[A-Z]{2,4}']);
                 echo $this->Form->control('ppl_user_id', ['options' => $pplUsers, 'label' => 'Teacher']);
             ?>
         </div>
     <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
     <?= $this->Form->end() ?>
 </div>
