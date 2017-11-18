<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplCollaborator[]|\Cake\Collection\CollectionInterface $pplCollaborators
 */
?>
<h3>
    <?= __('Collaborators') ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']) ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']) ?>
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
