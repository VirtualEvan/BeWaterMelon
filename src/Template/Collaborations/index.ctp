<?php $currentuser = $this->request->session()->read('Auth.User'); ?>

<!-- Members info -->
<div class='container part'>
    <h4> <?= __('Member of') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_members', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($colMembers as $colMember): ?>
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto text-center">
                            <?php
                                if (substr($colMember->link, 0, 4) != "http"){
                                  $colMember->link = "http://".$colMember->link;
                                }
                            ?>
                            <?= $this->Html->link($this->Html->image('col_members/'.$colMember['id'], ['height' => '150px', 'width' => '150px', 'class' => 'col-img']), $colMember->link, ['escape' => false]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mx-auto">
                            <h5><?= h($colMember->name) ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php if($currentuser['rol'] == 'admin'): ?>
                            <div class="col-md-4 mx-auto text-center">
                                    <?= $this->Html->link(null, ['controller' => 'col_members', 'action' => 'edit', $colMember->id], ['class' => 'btn btn-info btn-sm fa fa-pencil']) ?>
                                    <?= $this->Form->postLink(null, ['controller' => 'col_members', 'action' => 'delete', $colMember->id], ['class' => 'btn btn-info btn-sm fa fa-trash']) ?>
                            </div>
                        <?php endif; ?>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto text-center">
                            <?= $this->Html->image('col_colleagues/'.$colColleague['id'], ['height' => '100px', 'width' => '100px', 'class' => 'col-img']); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mx-auto text-center">
                            <table>
                                <tr>
                                    <th>
                                        <h5>
                                            <?php
                                                if ($colColleague->doctor){
                                                    echo h($colColleague->name).', PhD';
                                                }
                                                else {
                                                    echo h($colColleague->name);
                                                }
                                            ?>
                                        </h5>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= h($colColleague->position) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= h($colColleague->department) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= h($colColleague->company) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= h($colColleague->email) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                            if (substr($colColleague->link, 0, 4) != "http"){
                                              $colColleague->link = "http://".$colColleague->link;
                                            }
                                        ?>
                                        <?= $this->Html->link(h($colColleague->link), $colColleague->link, ['escape' => false]) ?>
                                    </td>
                                </tr>
                            </table>


                        </div>
                    </div>

                    <div class="row">
                        <?php if($currentuser['rol'] == 'admin'): ?>
                            <div class="col-md-4 mx-auto text-center">
                                    <?= $this->Html->link(null, ['controller' => 'col_colleagues', 'action' => 'edit', $colColleague->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                    <?= $this->Form->postLink(null, ['controller' => 'col_colleagues', 'action' => 'delete', $colColleague->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                            </div>
                        <?php endif; ?>
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
            <div class="col-md-11">
                <div class="card-block">
                    <div class="container">
                        <div class="row">
                            <?php if($currentuser['rol'] == 'admin'): ?>
                                <div class="col-md-1">
                                        <?= $this->Html->link(null, ['controller' => 'col_groups', 'action' => 'edit', $colGroup->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                        <?= $this->Form->postLink(null, ['controller' => 'col_groups', 'action' => 'delete', $colGroup->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-2 pl-1 pr-1">
                                <?php
                                if (substr($colGroup->link, 0, 4) != "http"){
                                  $colGroup->link = "http://".$colGroup->link;
                                }
                                ?>
                                <?= $this->Html->link($this->Html->image('col_groups/'.$colGroup['id'], ['height' => '100px', 'width' => '100px', 'class' => 'col-img']), $colGroup->link, ['escape' => false]) ?>
                            </div>
                            <div class="col-md-8">
                                <table>
                                    <tr>
                                        <th>
                                            <h5> <?= h($colGroup->name) ?> </h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6> <?= h($colGroup->department) ?> </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6> <?= h($colGroup->company) ?> </h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
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
                        <div class="mx-auto text-center">
                            <?php
                                if (substr($colInstitution->link, 0, 4) != "http"){
                                  $colInstitution->link = "http://".$colInstitution->link;
                                }
                            ?>
                            <?= $this->Html->link($this->Html->image('col_institutions/'.$colInstitution['id'], ['height' => '150px', 'width' => '150px', 'class' => 'col-img']), $colInstitution->link, ['escape' => false]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mx-auto">
                            <h5><?= h($colInstitution->name) ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php if($currentuser['rol'] == 'admin'): ?>
                            <div class="mx-auto text-center">
                                    <?= $this->Html->link(null, ['controller' => 'col_institutions', 'action' => 'edit', $colInstitution->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                    <?= $this->Form->postLink(null, ['controller' => 'col_institutions', 'action' => 'delete', $colInstitution->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
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
                        <div class="mx-auto text-center mb-2">
                            <?php
                            if (substr($colCompany->link, 0, 4) != "http"){
                              $colCompany->link = "http://".$colCompany->link;
                            }
                            ?>
                            <?= $this->Html->link($this->Html->image('col_companies/'.$colCompany['id'], ['height' => '150px', 'width' => '150px', 'class' => 'col-img']), $colCompany->link, ['escape' => false]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php if($currentuser['rol'] == 'admin'): ?>
                            <div class="mx-auto text-center">
                                <?= $this->Html->link(null, ['controller' => 'col_companies', 'action' => 'edit', $colCompany->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'col_companies', 'action' => 'delete', $colCompany->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
