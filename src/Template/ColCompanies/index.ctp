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
        <?php foreach ($colCompanies as $colCompany): ?>
            <div class="col-md-4">
                <div class="container">
                    <div class="row">
                        <div class="mx-auto text-center mb-2">
                            <?php
                            if (substr($colCompany->link, 0, 4) != "http"){
                              $colCompany->link = "http://".$colCompany->link;
                            }
                            ?>
                            <?= $this->Html->link($this->Html->image('col_companies/'.$colCompany['id'], ['height' => '150px', 'width' => '150px', 'class' => 'col-img']), $colCompany->link, ['escape' => false]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php if($currentuser['rol'] == 'admin'): ?>
                            <div class="mx-auto text-center">
                                <?= $this->Html->link(null, ['controller' => 'col_companies', 'action' => 'edit', $colCompany->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'col_companies', 'action' => 'delete', $colCompany->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
