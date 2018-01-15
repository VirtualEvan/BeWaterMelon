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
    if($currentuser['rol'] == 'admin' || $currentuser['rol'] == 'reg'){
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
            <?php if($currentuser['rol'] == 'admin' || $currentuser['rol'] == 'reg'): ?>
                <div class="col-md-1">
                        <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'edit', $pubBook->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                        <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'delete', $pubBook->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                </div>
            <?php endif; ?>
            <div class="col-md-11 my-auto p-0">
                <?php foreach($pplUsers as $pplUser)
                    if(in_array($pplUser->id, explode(',', $pubBook->author))){
                        echo $this->Html->link($pplUser->name . ' ' . $pplUser->lastname, ['controller' => 'ppl_users', 'action' => 'view', $pplUser->id]);
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
