<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResContract[]|\Cake\Collection\CollectionInterface $resContracts
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container part'>
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
                                <?php foreach ($resContract->res_contract_participants as $key => $contractParticipants): ?>
                                    <?= h($contractParticipants->participant) ?>
                                    <?= h($contractParticipants->link) ?>
                                    <?php
                                        if($key != sizeof($contractParticipants)-1){
                                            echo ' and ';
                                        }
                                    ?>
                                <?php endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <td> <?= __('Scheduling: ') ?> </td>
                                <td> <?= h($resContract->scheduling) ?> </td>
                            </tr>
                            <tr>
                                <td> <?= __('Founded by: ') ?> </td>
                                <td> <?= $this->Html->link($this->Html->image('res_contracts/'.$resContract['id'], ['height' => '50px', 'width' => '50px']), $resContract->sponsor_link, ['escape' => false]); ?> </td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
