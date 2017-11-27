<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProProduct $proProduct
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>

<div class="container part">
    <h4> <?= $this->Html->link(h($proProduct->name), ['controller' => 'pro_products','action' => 'view', $proProduct->id], ['class' => 'link-product']) ?> </h4>
    <?= $this->Html->link(null, ['controller' => 'pro_products', 'action' => 'edit', $proProduct->id], ['class' => 'btn btn-info btn-sm fa fa-pencil']) ?>
    <?= $this->Form->postLink(null, ['controller' => 'pro_products', 'action' => 'delete', $proProduct->id], ['class' => 'btn btn-info btn-sm fa fa-trash']) ?>

    <hr/>
        <div class="row">
            <div class="col-md-8 my-auto p-0">
                <p><?= h($proProduct->description) ?></p>
                <p><?= h($proProduct->detailed_description) ?></p>
            </div>
            <div class="col-md-3 my-auto">
                <!--TODO link en imagen a pagina externa-->
                <?php //$this->Html->link($this->Html->image('pro_products/'.$proProduct['id'], ['width' => '100px', 'height' => '100px', 'escape' => false]), ['escape' => false]) ?>
                <?= $this->Html->image('pro_products/'.$proProduct['id'], ['width' => '150px', 'height' => '150px', 'escape' => false]) ?>
            </div>
    </div>
</div>
