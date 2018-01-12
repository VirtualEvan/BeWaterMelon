<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColMember[]|\Cake\Collection\CollectionInterface $colMembers
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
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
