<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPostdoc[]|\Cake\Collection\CollectionInterface $pplPostdocs
 */
?>
<h3>
    <?= __('Ppl Postdocs') ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']) ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']) ?>
</h3>
<div class="container">
    <div class="row">
        <?php
            foreach ($pplPostdocs as $key => $pplPostdoc): ?>
                <?php
                    echo h($pplPostdoc->name) . ' ' . h($pplPostdoc->lastname);
                    if($key != sizeof($pplPostdocs)-1){
                        echo ', ';
                    }
                ?>
        <?php endforeach; ?>
    </div>
</div>
