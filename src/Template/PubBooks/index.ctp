<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubBook[]|\Cake\Collection\CollectionInterface $pubBooks
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
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
                            <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'delete', $pubBook->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-md-12">
                    <div class="row">
                        <?= h($pubBook->book_name) ?>
                        <a href="<?= h($pubBook->link) ?>"><?= h($pubBook->author) ?></a>
                        <?= h($pubBook->editorial) ?> <?= h($pubBook->year) ?>
                        <?= h($pubBook->country) ?> <?= h($pubBook->isbn) ?>
                        <?= h($pubBook->physical_identifier) ?>
                    </div>
                </div>
        </div>
        </div>
    <?php endforeach; ?>
</div>
