<?php $currentuser = $this->request->session()->read('Auth.User'); ?>
<div class='container part'>
    <!-- Projects info -->
    <h4> <?= __('Projects') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'res_projects', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($resProjects as $resProject): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-1">
                                <?= $this->Html->link(null, ['controller' => 'res_projects', 'action' => 'edit', $resProject->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'res_projects', 'action' => 'delete', $resProject->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-11 my-auto p-0">
                        <table>
                            <th>
                                <?= h($resProject->name) ?>
                            </th>
                            <tr>
                                <td><?= __('Code: ') ?></td>
                                <td><?= h($resProject->code) ?></td>
                            </tr>
                            <tr>
                                <td><?= __('Participants: ') ?> </td>
                                <td>
                                <?php foreach ($resProject->res_project_participants as $key => $projectParticipants):
                                    if (substr($projectParticipants->link, 0, 4) != "http"){
                                      $projectParticipants->link = "http://".$projectParticipants->link;
                                    }
                                    ?>
                                    <?= $this->Html->link($projectParticipants->participant, $projectParticipants->link) ?>
                                    <?php
                                        if($key != sizeof($resProject->res_project_participants)-1){
                                            echo ' and ';
                                        }
                                    ?>
                                <?php endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= __('Scheduling: ') ?> </td>
                                <td><?= h($resProject->scheduling) ?> </td>
                            </tr>
                            <tr>
                                <td><?= __('Founded by: ') ?> </td>
                                <?php if (substr($resProject->sponsor_link, 0, 4) != "http"){
                                        $resProject->sponsor_link = "http://".$resProject->sponsor_link;
                                    } ?>
                                <td><?= $this->Html->link($this->Html->image('res_projects/'.$resProject['id'], ['height' => '50px', 'width' => '50px']), $resProject->sponsor_link, ['escape' => false]); ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Contracts info -->
    <h4> <?= __('Contracts') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'res_contracts', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($resContracts as $resContract): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-1">
                                <?= $this->Html->link(null, ['controller' => 'res_contracts', 'action' => 'edit', $resContract->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'res_contracts', 'action' => 'delete', $resContract->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-11 my-auto p-0">
                        <table>
                            <th>
                                <?= h($resContract->name) ?>
                            </th>
                            <tr>
                                <td><?= __('Code: ') ?></td>
                                <td><?= h($resContract->code) ?></td>
                            </tr>
                            <tr>
                                <td><?= __('Participants: ') ?> </td>
                                <td>
                                <?php foreach ($resContract->res_contract_participants as $key => $contractParticipants):
                                    if (substr($contractParticipants->link, 0, 4) != "http"){
                                      $contractParticipants->link = "http://".$contractParticipants->link;
                                    }
                                    ?>
                                    <?= $this->Html->link($contractParticipants->participant, $contractParticipants->link) ?>
                                    <?php
                                        if($key != sizeof($resContract->res_contract_participants)-1){
                                            echo ' and ';
                                        }
                                    ?>
                                <?php endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= __('Scheduling: ') ?> </td>
                                <td><?= h($resContract->scheduling) ?> </td>
                            </tr>
                            <tr>
                                <td><?= __('Founded by: ') ?> </td>
                                <?php if (substr($resContract->sponsor_link, 0, 4) != "http"){
                                        $resContract->sponsor_link = "http://".$resContract->sponsor_link;
                                    } ?>
                                <td><?= $this->Html->link($this->Html->image('res_contracts/'.$resContract['id'], ['height' => '50px', 'width' => '50px']), $resContract->sponsor_link, ['escape' => false]); ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Patents info -->
    <h4> <?= __('Patents') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'res_patents', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($resPatents as $resPatent): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-1">
                                <?= $this->Html->link(null, ['controller' => 'res_patents', 'action' => 'edit', $resPatent->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'res_patents', 'action' => 'delete', $resPatent->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-11 my-auto p-0">
                        <table>
                            <th>
                                <?= h($resPatent->name) ?>
                            </th>
                            <tr>
                                <td><?= __('Code: ') ?></td>
                                <?php if (substr($resPatent->link, 0, 4) != "http"){
                                        $resPatent->link = "http://".$resPatent->link;
                                    } ?>
                                <td><?= $this->Html->link(h($resPatent->code), $resPatent->link) ?> </td>
                            </tr>
                            <tr>
                                <td><?= __('Year: ') ?> </td>
                                <td><?= h($resPatent->year) ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
