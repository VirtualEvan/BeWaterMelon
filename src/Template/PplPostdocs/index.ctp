<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPostdoc[]|\Cake\Collection\CollectionInterface $pplPostdocs
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
    <h3>
        <?= __('Ppl Postdocs') ?>
        <?php
            if($currentuser['rol'] == 'admin'){
                echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
                echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']);
                echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']);
            }
        ?>
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
</div>
