<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser[]|\Cake\Collection\CollectionInterface $pplUsers
 */
?>
<div class='container'>
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
                                        <?= $this->Form->postLink(null, ['action' => 'delete', $pplUser->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
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
</div>
