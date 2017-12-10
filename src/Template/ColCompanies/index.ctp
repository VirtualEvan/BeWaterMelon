<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColCompany[]|\Cake\Collection\CollectionInterface $colCompanies
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
    <h4> <?= __('Companies') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'col_companies', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($colCompanies as $colCompanie): ?>
            <div class="col-md-4">
                <div class="container">
                    <div class="row">
                        <?php if($currentuser['rol'] == 'admin'): ?>
                            <div class="col-md-1">
                                    <?= $this->Html->link(null, ['controller' => 'col_companies', 'action' => 'edit', $colCompanie->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                    <?= $this->Form->postLink(null, ['controller' => 'col_companies', 'action' => 'delete', $colCompanie->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-3">
                            <?php
                            if (substr($colCompanie->link, 0, 4) != "http"){
                              $colCompanie->link = "http://".$colCompanie->link;
                            }
                            ?>
                            <?= $this->Html->link($this->Html->image('col_companies/'.$colCompanie['id'], ['height' => '150px', 'width' => '150px']), $colCompanie->link, ['escape' => false]) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
