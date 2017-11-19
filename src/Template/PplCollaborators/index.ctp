<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplCollaborator[]|\Cake\Collection\CollectionInterface $pplCollaborators
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
    <h3>
        <?= __('Collaborators') ?>
        <?php
            if($currentuser['rol'] == 'admin'){
                echo $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
                echo $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']);
                echo $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']);
            }
        ?>
    </h3>
    <div class="container">
        <div class="row">
            <?php foreach ($pplCollaborators as $key => $pplCollaborator): ?>
            <tr>
                <?= h($pplCollaborator->name) . ' ' . h($pplCollaborator->lastname) ?>
                <?php
                    if ($pplCollaborator->doctor){
                        echo ' (PhD)';
                    }
                    if($key != sizeof($pplCollaborators)-1){
                        echo ' - ';
                    }
                ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
