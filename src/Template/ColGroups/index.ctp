<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColGroup[]|\Cake\Collection\CollectionInterface $colGroups
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>

<div class='container'>
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
