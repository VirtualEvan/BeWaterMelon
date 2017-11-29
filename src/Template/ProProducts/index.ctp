<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProProduct[]|\Cake\Collection\CollectionInterface $proProducts
 */
  $currentuser = $this->request->session()->read('Auth.User');
?>
<div class="container part">
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(__('Add Product'), ['controller' => 'pro_products', 'action' => 'add'], ['class' => 'btn btn-info btn-sm']);
    }
    ?>
    <div class="row">
        <?php foreach ($proProducts as $proProduct): ?>
            <div class="container part">
                <h4> <?= $this->Html->link(h($proProduct->name), ['controller' => 'pro_products','action' => 'view', $proProduct->id], ['class' => 'link-product']) ?> </h4>
                <hr/>
                    <div class="row">
                        <?php if($currentuser['rol'] == 'admin'): ?>
                            <div class="col-md-1  my-auto">
                                    <?= $this->Html->link(null, ['controller' => 'pro_products', 'action' => 'edit', $proProduct->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                    <?= $this->Form->postLink(null, ['controller' => 'pro_products', 'action' => 'delete', $proProduct->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-8 my-auto p-0">
                            <?= h($proProduct->description) ?>
                        </div>
                        <div class="col-md-3 my-auto">
                            <!--TODO si la url no existe se queda cargando indefinidamente-->
                            <?php //$this->Html->link($this->Html->image('pro_products/'.$proProduct['id'], ['width' => '100px', 'height' => '100px', 'escape' => false]), ['escape' => false]) ?>
                            <?php if (substr($proProduct->link, 0, 4) != "http"){
                              $proProduct->link = "http://".$proProduct->link;
                            }
                            echo $proProduct->link;
                            ?>

                            <?= $this->Html->link($this->Html->image('pro_products/'.$proProduct['id'], ['height' => '150px', 'width' => '150px']), $proProduct->link, array('escape' => false)); ?>
                        </div>
                </div>
            </div>
        <?php endforeach; ?>
</div>
