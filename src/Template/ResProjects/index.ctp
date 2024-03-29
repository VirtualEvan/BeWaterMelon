<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResProject[]|\Cake\Collection\CollectionInterface $resProjects
 */
  $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container part'>
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
                    <table>
                        <tr>
                            <th colspan="2">
                                <?= h($resProject->name) ?>
                            </th>
                        </tr>
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
                            <td> <?= $this->Html->link($this->Html->image('res_projects/'.$resProject['id'], ['height' => '50px', 'width' => '50px']), $resProject->sponsor_link, ['escape' => false]); ?> </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
