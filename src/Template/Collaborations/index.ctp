<?php $currentuser = $this->request->session()->read('Auth.User'); ?>

<!-- Members info -->
<div class='container-part'>
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
</div>

    <!-- Colleagues info -->
<div class='container part'>
    <h4> <?= __('Colleagues') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_colleagues', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($colColleagues as $colColleague): ?>
            <div class="col-md-6">
                <div class="card-block">
                    <div class="container">
                        <div class="row">
                                <?php if($currentuser['rol'] == 'admin'): ?>
                                    <div class="col-md-1">
                                            <?= $this->Html->link(null, ['controller' => 'col_colleagues', 'action' => 'edit', $colColleague->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                            <?= $this->Form->postLink(null, ['controller' => 'col_colleagues', 'action' => 'delete', $colColleague->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-4">
                                        <?= $this->Html->image('col_colleagues/'.$colColleague['id'], ['height' => '100px', 'width' => '100px']); ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <h5> <?= h($colColleague->name) ?>
                                            <?php if ($colColleague->doctor){
                                                echo ', PhD';
                                            } ?>
                                        </h5>
                                    </div>
                                    <div class="row">
                                        <h6> <?= h($colColleague->position) ?> </h6>
                                    </div>
                                    <div class="row">
                                        <h6> <?= h($colColleague->department) ?>  </h6>
                                    </div>
                                    <div class="row">
                                        <h6> <?= h($colColleague->company) ?>  </h6>
                                    </div>
                                    <div class="row">
                                        <?= h($colColleague->email) ?>
                                    </div>
                                    <div class="row">
                                        <?php
                                        if (substr($colColleague->link, 0, 4) != "http"){
                                          $colColleague->link = "http://".$colColleague->link;
                                        }
                                        ?>
                                        <?= $this->Html->link(h($colColleague->link), $colColleague->link, ['escape' => false]) ?>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    <!-- Groups info -->
<div class='container part'>
    <h4> <?= __('Groups') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_groups', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
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
                        <div class="row">
                            <h5> <?= h($colGroup->name) ?> </h5>
                        </div>
                        <div class="row">
                            <h6> <?= h($colGroup->department) ?> </h6>
                        </div>
                        <div class="row">
                            <h6> <?= h($colGroup->company) ?> </h6>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    <!-- Institutions info -->
<div class='container part'>
    <h4> <?= __('Institutions') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_institutions', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($colInstitutions as $colInstitution): ?>
            <div class="col-md-4">
                <div class="container">
                    <div class="row">
                        <?php if($currentuser['rol'] == 'admin'): ?>
                            <div class="col-md-1">
                                    <?= $this->Html->link(null, ['controller' => 'col_institutions', 'action' => 'edit', $colInstitution->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                    <?= $this->Form->postLink(null, ['controller' => 'col_institutions', 'action' => 'delete', $colInstitution->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-3">
                            <?php
                            if (substr($colInstitution->link, 0, 4) != "http"){
                              $colInstitution->link = "http://".$colInstitution->link;
                            }
                            ?>
                            <?= $this->Html->link($this->Html->image('col_institutions/'.$colInstitution['id'], ['height' => '150px', 'width' => '150px']), $colInstitution->link, ['escape' => false]) ?>
                            <h5 class="text-center"><?= h($colInstitution->name) ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </row>
</div>

<!-- Companies info -->
<div class='container part'>
    <h4> <?= __('Companies') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_companies', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($colCompanies as $colCompany): ?>
            <div class="col-md-4">
                <div class="container">
                    <div class="row">
                        <?php if($currentuser['rol'] == 'admin'): ?>
                            <div class="col-md-1">
                                    <?= $this->Html->link(null, ['controller' => 'col_companies', 'action' => 'edit', $colCompany->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                    <?= $this->Form->postLink(null, ['controller' => 'col_companies', 'action' => 'delete', $colCompany->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-3">
                            <?php
                            if (substr($colCompany->link, 0, 4) != "http"){
                              $colCompany->link = "http://".$colCompany->link;
                            }
                            ?>
                            <?= $this->Html->link($this->Html->image('col_companies/'.$colCompany['id'], ['height' => '150px', 'width' => '150px']), $colCompany->link, ['escape' => false]) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
