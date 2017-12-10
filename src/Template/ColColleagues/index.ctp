<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColColleague[]|\Cake\Collection\CollectionInterface $colColleagues
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>

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
