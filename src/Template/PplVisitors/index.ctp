<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplVisitor[]|\Cake\Collection\CollectionInterface $pplVisitors
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container part'>
    <h4>
        <?= __('Visitors') ?>
    </h4>
    <?php
        if($currentuser['rol'] == 'admin'){
            echo $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
            echo ' ';
            echo $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-info btn-sm fa fa-pencil']);
            echo ' ';
            echo $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-info btn-sm fa fa-trash']);
        }
    ?>
    <hr/>
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
