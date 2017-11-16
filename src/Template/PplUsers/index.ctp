<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser[]|\Cake\Collection\CollectionInterface $pplUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ppl User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cou Subjects'), ['controller' => 'CouSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cou Subject'), ['controller' => 'CouSubjects', 'action' => 'add']) ?></li>
    </ul>
</nav>

<!-- Members info -->
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
    <?= $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil'])?>
    <?= $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash'])?>
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
        <?= $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil'])?>
        <?= $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash'])?>
    </h3>
            <?php foreach ($pplPostdocs as $pplPostdoc): ?>
            <tr>
                <td><?= $this->Number->format($pplPostdoc->id) ?></td>
                <td><?= h($pplPostdoc->name) ?></td>
                <td><?= h($pplPostdoc->lastname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pplPostdoc->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pplPostdoc->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pplPostdoc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplPostdoc->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>

<!-- Phds visitors -->

    <h3>
        <?= __('Ppl Visitors') ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus'])?>
        <?= $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil'])?>
        <?= $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash'])?>
    </h3>
            <?php foreach ($pplVisitors as $pplVisitor): ?>
            <tr>
                <td><?= $this->Number->format($pplVisitor->id) ?></td>
                <td><?= h($pplVisitor->name) ?></td>
                <td><?= h($pplVisitor->lastname) ?></td>
                <td><?= h($pplVisitor->link) ?></td>
                <td><?= h($pplVisitor->doctor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pplVisitor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pplVisitor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pplVisitor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplVisitor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>


<!-- Past phds info -->
    <h3>
        <?= __('Ppl Past Phds') ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus'])?>
        <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil'])?>
        <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'delete', ''], ['class' => 'btn btn-danger fa fa-trash'])?>
    </h3>
            <?php foreach ($pplPastPhds as $pplPastPhd): ?>
            <tr>
                <td><?= $this->Number->format($pplPastPhd->id) ?></td>
                <td><?= h($pplPastPhd->name) ?></td>
                <td><?= h($pplPastPhd->lastname) ?></td>
                <td><?= h($pplPastPhd->thesis_date) ?></td>
                <td><?= h($pplPastPhd->thesis_name) ?></td>
                <td><?= h($pplPastPhd->thesis_link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pplPastPhd->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pplPastPhd->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pplPastPhd->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplPastPhd->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>

<!-- Collaborators info -->
    <h3>
        <?= __('Ppl Collaborators') ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus'])?>
        <?= $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil'])?>
        <?= $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash'])?>
    </h3>
            <?php foreach ($pplCollaborators as $pplCollaborator): ?>
            <tr>
                <td><?= $this->Number->format($pplCollaborator->id) ?></td>
                <td><?= h($pplCollaborator->name) ?></td>
                <td><?= h($pplCollaborator->lastname) ?></td>
                <td><?= h($pplCollaborator->doctor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pplCollaborator->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pplCollaborator->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pplCollaborator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplCollaborator->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
