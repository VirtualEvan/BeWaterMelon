<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplVisitor[]|\Cake\Collection\CollectionInterface $pplVisitors
 */
?>
<h3>
    <?= __('Ppl Visitors') ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']) ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']) ?>
</h3>
<div class="container">
    <div class="row">
        <?php foreach ($pplVisitors as $pplVisitor): ?>
            <?= $this->Html->link($pplVisitor->name . ' ' . $pplVisitor->lastname, ['link' => $pplVisitor->link], ['class' => 'btn btn-danger fa fa-trash']) ?>
            <?php
                if ($pplVisitor->doctor){
                    echo ' (PhD)';
                }
            ?>
        <?php endforeach; ?>
    </div>
</div>
