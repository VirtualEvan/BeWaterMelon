<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubBook[]|\Cake\Collection\CollectionInterface $pubBooks
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
    <h3> <?= __('Books') ?> </h3>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
    }
    ?>
    <div class="row">
        <?php foreach ($pubBooks as $pubBook): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-2">
                            <div class="row">
                                <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'edit', $pubBook->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'pub_books', 'action' => 'delete', $pubBook->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-12">
                        <div class="row">
                            <?php foreach($authors as $autor)
                                if(in_array($autor->id, explode(',', $pubBook->author))){
                                    echo $this->Html->link($autor->name . ' ' . $autor->lastname, ['link' => $pubBook->author]);
                                    echo ', ';
                                }
                            ?>
                            <?= h($pubBook->editorial) ?> <?= h($pubBook->year) ?>
                            <?= h($pubBook->country) ?> <?= h($pubBook->isbn) ?>
                            <?= h($pubBook->physical_identifier) ?>
                        </div>
                    </div>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
