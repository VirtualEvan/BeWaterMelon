<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser[]|\Cake\Collection\CollectionInterface $pplUsers
 */
?>
<h3> <?= __('Members') ?> <?= $this->Html->link(null, ['action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?> </h3>
<div class="row">
    <?php foreach ($pplUsers as $pplUser): ?>
        <div class="card col-md-6">
          <div class="card-block">
                <div class="container">
                    <div class="row">
                            <div class="col-md-1">
                                <div class="row">
                                    <?= $this->Html->link(null, ['action' => 'edit', $pplUser->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                                </div>
                                <div class="row">
                                    <?= $this->Html->link(null, ['action' => 'delete', $pplUser->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="#" width="100px" height="100px"></img>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <?= h($pplUser->name) ?>
                                </div>
                                <div class="row">
                                    <?= h($pplUser->email) ?>
                                </div>
                                <div class="row">
                                    <?= h($pplUser->rol) ?>
                                </div>
                            </div>
                    </div>
                </div>
          </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Phds info -->
<h3>
    <?= __('Ppl Phds') ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']) ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']) ?>
</h3>
<div class="row">
    <?php foreach ($pplPhds as $pplPhd): ?>
        <div class="card col-md-6">
          <div class="card-block">
                <div class="container">
                    <div class="row">
                            <div class="col-md-1">
                                <div class="row">
                                    <a class="btn btn-warning fa fa-pencil"></a>
                                </div>
                                <div class="row">
                                    <a class="btn btn-danger fa fa-trash"></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="#" width="100px" height="100px"></img>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <?= h($pplPhd->name) ?>
                                </div>
                                <div class="row">
                                    <?= h($pplPhd->lastname) ?>
                                </div>
                                <div class="row">
                                    <?= h($pplPhd->thesis_name) ?>
                                </div>
                            </div>
                    </div>
                </div>
          </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Postdocs info -->

    <h3>
        <?= __('Ppl Postdocs') ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']) ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']) ?>
    </h3>
    <div class="container">
        <div class="row">
            <?php foreach ($pplPostdocs as $pplPostdoc): ?>
                <?= h($pplPostdoc->name) ?>
                <?= ', ' ?>
                <?= h($pplPostdoc->lastname) ?>
            <?php endforeach; ?>
        </div>
    </div>


<!-- Phds visitors -->

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

<!-- Past phds info -->
    <h3>
        <?= __('Ppl Past Phds') ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']) ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'delete', ''], ['class' => 'btn btn-danger fa fa-trash']) ?>
    </h3>
    <div class="container">
        <div class="row">
            <?php // TODO: darle formato a esto
            foreach ($pplPastPhds as $pplPastPhd): ?>
                <?= h($pplPastPhd->name) ?>
                <?= h($pplPastPhd->lastname) ?>
                <?= h($pplPastPhd->thesis_date) ?>
                <?= h($pplPastPhd->thesis_name) ?>
                <?= h($pplPastPhd->thesis_link) ?>
            <?php endforeach; ?>
        </div>
    </div>


<!-- Collaborators info -->
    <h3>
        <?= __('Ppl Collaborators') ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']) ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']) ?>
    </h3>
    <div class="container">
        <div class="row">
            <?php foreach ($pplCollaborators as $pplCollaborator): ?>
            <tr>
                <?= h($pplCollaborator->name) . ' ' . h($pplCollaborator->lastname) ?>
                <?php
                    if ($pplCollaborator->doctor){
                        echo ' (PhD)';
                    }
                ?>
            <?php endforeach; ?>
        </div>
    </div>
