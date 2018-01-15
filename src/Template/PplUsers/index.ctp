<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser[]|\Cake\Collection\CollectionInterface $pplUsers
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container part'>
    <h4> <?= __('Members') ?> </h4>
    <?php
        if($currentuser['rol'] == 'admin'){
            echo $this->Html->link(null, ['controller' => 'ppl_users', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
        }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($pplUsers as $pplUser): ?>
            <div class="card col-md-6">
                <div class="card-block">
                    <div class="container">
                        <div class="row">
                                <?php if($currentuser['rol'] == 'admin' || $currentuser['id'] == $pplUser->id): ?>
                                    <div class="col-md-1 p-0">
                                            <?= $this->Html->link(null, ['controller' => 'ppl_users', 'action' => 'edit', $pplUser->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                            <?= $this->Form->postLink(null, ['controller' => 'ppl_users', 'action' => 'delete', $pplUser->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-4">
                                    <?php if(file_exists(WWW_ROOT . 'img/ppl_users/' . $pplUser['id'])): ?>
                                        <?= $this->Html->link($this->Html->image('ppl_users/'.$pplUser['id'], ['height' => '100px', 'width' => '100px']), ['controller' => 'ppl_users', 'action' => 'view', $pplUser->id], ['escape' => false]); ?>
                                    <?php else: ?>
                                        <?= $this->Html->link($this->Html->image('profile_img.svg', ['height' => '100px', 'width' => '100px']), ['controller' => 'ppl_users', 'action' => 'view', $pplUser->id], ['escape' => false]); ?>
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
