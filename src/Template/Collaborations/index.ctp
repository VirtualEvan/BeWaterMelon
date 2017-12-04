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
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-1">
                                <?= $this->Html->link(null, ['controller' => 'col_members', 'action' => 'edit', $colMember->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'col_members', 'action' => 'delete', $colMember->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-11 my-auto p-0">
                        <table>
                            <tr>
                                <td>
                                </td>
                            </tr>
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
