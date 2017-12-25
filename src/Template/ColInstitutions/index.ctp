<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColInstitution[]|\Cake\Collection\CollectionInterface $colInstitutions
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>

<div class='container'>
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
                            <?= $this->Html->link($this->Html->image('col_institutions/'.$colInstitution['id'], ['height' => '150px', 'width' => '150px']), $colInstitution->link, ['escape' => false]) ?>
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
