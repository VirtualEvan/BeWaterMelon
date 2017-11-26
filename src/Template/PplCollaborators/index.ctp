<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplCollaborator[]|\Cake\Collection\CollectionInterface $pplCollaborators
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container part'>
    <h4>
        <?= __('Collaborators') ?>
    </h4>
    <?php
        if($currentuser['rol'] == 'admin'){
            echo $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
            echo ' ';
            echo $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'edit'], ['class' => 'btn btn-info btn-sm fa fa-pencil']);
            echo ' ';
            echo $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'edit'], ['class' => 'btn btn-info btn-sm fa fa-trash']);
        }
    ?>
    <hr/>
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
