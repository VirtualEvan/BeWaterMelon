<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColColleague[]|\Cake\Collection\CollectionInterface $colColleagues
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>

<div class='container'>
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
                            <?= $this->Html->image('col_colleagues/'.$colColleague['id'], ['height' => '100px', 'width' => '100px']); ?>
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
