<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser[]|\Cake\Collection\CollectionInterface $pplUsers
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
    <h3> <?= __('Members') ?>
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
                                        <?= $this->Html->image('ppl_users/profile_img.svg', ['width' => '100px', 'height' => '100px', 'escape' => false]) ?>
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

<!-- Phds info -->
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
</div>

<!-- Postdocs info -->

<div class='container'>
    <h3>
        <?= __('Postdocs') ?>
        <?php
            if($currentuser['rol'] == 'admin'){
                echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
                echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']);
                echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']);
            }
        ?>
    </h3>
    <div class="container">
        <div class="row">
            <?php
                foreach ($pplPostdocs as $key => $pplPostdoc): ?>
                    <?php
                        echo h($pplPostdoc->name) . ' ' . h($pplPostdoc->lastname);
                        if($key != sizeof($pplPostdocs)-1){
                            echo ', ';
                        }
                    ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<!-- Phds visitors -->

<div class='container'>
    <h3>
        <?= __('Visitors') ?>
        <?php
            if($currentuser['rol'] == 'admin'){
                echo $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
                echo $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-warning fa fa-pencil']);
                echo $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-danger fa fa-trash']);
            }
        ?>
    </h3>
    <div class="container">
        <div class="row">
            <?php foreach ($pplVisitors as $key => $pplVisitor): ?>
                <?= $this->Html->link($pplVisitor->name . ' ' . $pplVisitor->lastname, ['link' => $pplVisitor->link]) ?>
                <?php //TODO: Poner los espacios bien, tienen alt+255
                    if ($pplVisitor->doctor){
                        echo ' (PhD)';
                    }
                    if($key != sizeof($pplVisitors)-1){
                        echo ', ';
                    }
                ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Past phds info -->
<div class='container'>
    <h3>
        <?= __('Past PhD Students') ?>
        <?php
            if($currentuser['rol'] == 'admin'){
                echo $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
            }
        ?>
    </h3>
    <?php // TODO: darle formato a esto
    foreach ($pplPastPhds as $pplPastPhd): ?>
        <div class="container">
            <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-1">
                            <div class="row">
                                <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'edit', $pplPastPhd->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                            </div>
                            <div class="row">
                                <?= $this->Form->postLink(null, ['controller' => 'ppl_past_phds', 'action' => 'delete', $pplPastPhd->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-11 my-auto">
                        <?php
                            echo h($pplPastPhd->name);
                            echo ', ';
                            echo h($pplPastPhd->lastname);
                            echo '(';
                            echo h($pplPastPhd->thesis_date);
                            echo '). ';
                            echo h($pplPastPhd->thesis_name);
                            echo '. ';
                            echo $this->Html->link('info', ['link' => $pplPastPhd->thesis_name], ['class' => 'btn btn-info']);
                        ?>
                    </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<!-- Collaborators info -->
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
