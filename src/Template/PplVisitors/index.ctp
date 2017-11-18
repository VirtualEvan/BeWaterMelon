<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplVisitor[]|\Cake\Collection\CollectionInterface $pplVisitors
 */
?>
<div class='container'>
    <h3>
        <?= __('Visitors') ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']) ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']) ?>
    </h3>
    <div class="container">
        <div class="row">
            <?php foreach ($pplVisitors as $key => $pplVisitor): ?>
                <?= $this->Html->link($pplVisitor->name . ' ' . $pplVisitor->lastname, ['link' => $pplVisitor->link]) ?>
                <?php //TODO: Poner los espacios bien, tienen alt+255
                    if ($pplVisitor->doctor){
                        echo ' (PhD)';
                    }
                    if($key != sizeof($pplVisitors)-1){
                        echo ', ';
                    }
                ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
