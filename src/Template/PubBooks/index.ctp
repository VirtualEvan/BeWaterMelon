<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubBook[]|\Cake\Collection\CollectionInterface $pubBooks
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container part'>
    <h4> <?= __('Books') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div id="PaginationBooks" class="pagination"></div>
    <div id="SearchresultBooks"></div>
</div>

<div id="hiddenresultBooks" class="container" style="display: none;">
    <?php foreach ($pubBooks as $pubBook): ?>
        <div class="row result pag<?= 2018-$pubBook->year ?>">
            <?php if($currentuser['rol'] == 'admin'): ?>
                <div class="col-md-1">
                        <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'edit', $pubBook->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                        <?= $this->Form->postLink(null, ['controller' => 'pub_books', 'action' => 'delete', $pubBook->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                </div>
            <?php endif; ?>
            <div class="col-md-11 my-auto p-0">
                <?php foreach($authors as $autor)
                    if(in_array($autor->id, explode(',', $pubBook->author))){
                        echo $this->Html->link($autor->name . ' ' . $autor->lastname, ['controller' => 'ppl_users', 'action' => 'view', $autor->id]);
                        echo ', ';
                    }
                ?>
                <?= h($pubBook->editorial) . '. ' ?> <?= h($pubBook->year) . '. ' ?>
                <?= h($pubBook->country) . '. ' ?> <?= __('ISBN') ?>: <?= h($pubBook->isbn) . '. ' ?>
                <?php if(!empty($pubBook->physical_identifier)): echo __('Physical identifier:'); endif;?> <?= h($pubBook->physical_identifier) . '. ' ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->Html->script('paginate.js') ?>

<?= $this->Html->script('active-paginate-books.js') ?>
