<?php $currentuser = $this->request->session()->read('Auth.User'); ?>
<div class='container'>
    <!-- Members info -->
    <h4> <?= __('Member of') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_members', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($colMembers as $colMember): ?>
            <div class="col-md-4">
                <div class="container">
                    <div class="row">
                        <?php if($currentuser['rol'] == 'admin'): ?>
                            <div class="col-md-1">
                                    <?= $this->Html->link(null, ['controller' => 'col_members', 'action' => 'edit', $colMember->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                    <?= $this->Form->postLink(null, ['controller' => 'col_members', 'action' => 'delete', $colMember->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-3">
                            <?php
                            if (substr($colMember->link, 0, 4) != "http"){
                              $colMember->link = "http://".$colMember->link;
                            }
                            ?>
                            <?= $this->Html->link($this->Html->image('col_members/'.$colMember['id'], ['height' => '150px', 'width' => '150px']), $colMember->link, ['escape' => false]) ?>
                            <h5 class="text-center"><?= h($colMember->name) ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Colleagues info -->
    <h4> <?= __('Colleagues') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_colleagues', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <?php foreach ($colColleagues as $colColleague): ?>
        <div class="container">
            <div class="row">

            </div>
        </div>
    <?php endforeach; ?>

    <!-- Groups info -->
    <h4> <?= __('Groups') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_groups', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <?php foreach ($colGroups as $colGroup): ?>
        <div class="container">
            <div class="row">
                <?php if($currentuser['rol'] == 'admin'): ?>
                    <div class="col-md-1">
                            <?= $this->Html->link(null, ['controller' => 'col_groups', 'action' => 'edit', $colGroup->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                            <?= $this->Form->postLink(null, ['controller' => 'col_groups', 'action' => 'delete', $colGroup->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                    </div>
                <?php endif; ?>
                <div class="col-md-3">
                    <?php
                    if (substr($colGroup->link, 0, 4) != "http"){
                      $colGroup->link = "http://".$colGroup->link;
                    }
                    ?>
                    <?= $this->Html->link($this->Html->image('col_groups/'.$colGroup['id'], ['height' => '150px', 'width' => '150px']), $colGroup->link, ['escape' => false]) ?>
                </div>
                <div class="col-md-6">
                    <h5> <?= h($colGroup->name) ?> </h5>
                    <h6> <?= h($colGroup->department) ?> </h6>
                    <h6> <?= h($colGroup->company) ?> </h6>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Institutions info -->
    <h4> <?= __('Institutions') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_institutions', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <?php foreach ($colInstitutions as $colInstitution): ?>
        <div class="container">
            <div class="row">
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Companies info -->
    <h4> <?= __('Companies') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_companies', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <?php foreach ($colCompanies as $colCompanie): ?>
        <div class="container">
            <div class="row">
            </div>
        </div>
    <?php endforeach; ?>

</div>
