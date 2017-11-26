<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPostdoc[]|\Cake\Collection\CollectionInterface $pplPostdocs
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container part'>
    <h4>
        <?= __('Postdocs') ?>
    </h4>
    <?php
        if($currentuser['rol'] == 'admin'){
            echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
            echo ' ';
            echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-info btn-sm fa fa-pencil']);
            echo ' ';
            echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-info btn-sm fa fa-trash']);
        }
    ?>
    <hr/>
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
</div>
