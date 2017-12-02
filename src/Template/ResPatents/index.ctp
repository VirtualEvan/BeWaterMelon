<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResPatent[]|\Cake\Collection\CollectionInterface $resPatents
 */
  $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container part'>
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
                                <!-- TODO link doesn't work-->
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
