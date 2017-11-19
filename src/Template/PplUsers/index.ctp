<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser[]|\Cake\Collection\CollectionInterface $pplUsers
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
    <h3>
        <?= __('Members') ?>
        <?php
            if($currentuser['rol'] == 'admin'){
                echo $this->Html->link(null, ['controller' => 'ppl_users', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
            }
        ?>
    </h3>
    <div class="row">
        <?php foreach ($pplUsers as $pplUser): ?>
            <div class="card col-md-6">
              <div class="card-block">
                    <div class="container">
                        <div class="row">
                                <?php if($currentuser['rol'] == 'admin'): ?>
                                    <div class="col-md-1">
                                        <div class="row">
                                            <?= $this->Html->link(null, ['controller' => 'ppl_users', 'action' => 'edit', $pplUser->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                                        </div>
                                        <div class="row">
                                            <?= $this->Form->postLink(null, ['controller' => 'ppl_users', 'action' => 'delete', $pplUser->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-4">
                                    <?php if(file_exists(WWW_ROOT . 'img/ppl_users/' . $pplUser['id'])): ?>
                                        <?= $this->Html->image('ppl_users/'.$pplUser['id'], ['width' => '100px', 'height' => '100px', 'escape' => false]) ?>
                                    <?php else: ?>
                                        <?= $this->Html->image('profile_img.svg', ['width' => '100px', 'height' => '100px', 'escape' => false]) ?>
                                    <?php endif; ?>
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
