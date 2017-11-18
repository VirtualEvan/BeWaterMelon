<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPhd[]|\Cake\Collection\CollectionInterface $pplPhds
 */
?>
<h3>
    <?= __('PhD Students') ?>
    <?= $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?>
</h3>
<div class="row">
    <?php foreach ($pplPhds as $pplPhd): ?>
        <div class="card col-md-6">
          <div class="card-block">
                <div class="container">
                    <div class="row">
                            <div class="col-md-1">
                                <div class="row">
                                    <?= $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'edit', $pplPhd->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                                </div>
                                <div class="row">
                                    <?= $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'delete', $pplPhd->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
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
