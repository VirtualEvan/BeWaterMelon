<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubBook[]|\Cake\Collection\CollectionInterface $pubBooks
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
    <h4> <?= __('Books') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($pubBooks as $pubBook): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-1">
                                <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'edit', $pubBook->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'pub_books', 'action' => 'delete', $pubBook->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-11 my-auto p-0">
                        <?php foreach($authors as $autor)
                            if(in_array($autor->id, explode(',', $pubBook->author))){
                                echo $this->Html->link($autor->name . ' ' . $autor->lastname, ['link' => $pubBook->author]);
                                echo ', ';
                            }
                        ?>
                        <?= h($pubBook->editorial) . '. ' ?> <?= h($pubBook->year) . '. ' ?>
                        <?= h($pubBook->country) . '. ' ?> <?= __('ISBN') ?>: <?= h($pubBook->isbn) . '. ' ?>
                        <?php if(!empty($pubBook->physical_identifier)): echo __('Physical identifier:'); endif;?> <?= h($pubBook->physical_identifier) . '. ' ?>
                    </div>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
