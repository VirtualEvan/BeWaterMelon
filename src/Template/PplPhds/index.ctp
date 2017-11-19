<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPhd[]|\Cake\Collection\CollectionInterface $pplPhds
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
    <h3>
        <?= __('PhD Students') ?>
        <?php
            if($currentuser['rol'] == 'admin'){
                echo $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
            }
        ?>
    </h3>
    <div class="row">
        <?php foreach ($pplPhds as $pplPhd): ?>
            <div class="card col-md-6">
              <div class="card-block">
                    <div class="container">
                        <div class="row">
                                <?php if($currentuser['rol'] == 'admin'): ?>
                                    <div class="col-md-1">
                                        <div class="row">
                                            <?= $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'edit', $pplPhd->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                                        </div>
                                        <div class="row">
                                            <?= $this->Form->postLink(null, ['controller' => 'ppl_phds', 'action' => 'delete', $pplPhd->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-4">
                                    <?php if(file_exists(WWW_ROOT . 'img/ppl_phds/' . $pplPhd['id'])): ?>
                                        <?= $this->Html->image('ppl_phds/'.$pplPhd['id'], ['width' => '100px', 'height' => '100px', 'escape' => false]) ?>
                                    <?php else: ?>
                                        <?= $this->Html->image('profile_img.svg', ['width' => '100px', 'height' => '100px', 'escape' => false]) ?>
                                    <?php endif; ?>
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
</div>
