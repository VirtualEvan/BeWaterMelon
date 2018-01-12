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
                                <?php if($currentuser['rol'] == 'admin'): ?>
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

<!-- Phds info -->
<div class='container part'>
    <h4>
        <?= __('PhD Students') ?>
    </h4>
    <?php
        if($currentuser['rol'] == 'admin'){
            echo $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
        }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($pplPhds as $pplPhd): ?>
            <div class="card col-md-6">
              <div class="card-block">
                    <div class="container">
                        <div class="row">
                                <?php if($currentuser['rol'] == 'admin'): ?>
                                    <div class="col-md-1 p-0">
                                            <?= $this->Html->link(null, ['controller' => 'ppl_phds', 'action' => 'edit', $pplPhd->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                            <?= $this->Form->postLink(null, ['controller' => 'ppl_phds', 'action' => 'delete', $pplPhd->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-4">
                                    <?php if(file_exists(WWW_ROOT . 'img/ppl_phds/' . $pplPhd['id'])): ?>
                                        <?= $this->Html->image('ppl_phds/'.$pplPhd['id'], ['height' => '100px', 'width' => '100px']); ?>
                                    <?php else: ?>
                                        <?= $this->Html->image('profile_img.svg', ['height' => '100px', 'width' => '100px']); ?>
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

<!-- Postdocs info -->

<div class='container part'>
    <h4>
        <?= __('Postdocs') ?>
    </h4>
    <?php
        if($currentuser['rol'] == 'admin'){
            echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
            echo ' ';
            echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-info btn-sm fa fa-pencil']);
            echo ' ';
            echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'edit'], ['class' => 'btn btn-info btn-sm fa fa-trash']);
        }
    ?>
    <hr/>
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

<div class='container part'>
    <h4>
        <?= __('Visitors') ?>
    </h4>
    <?php
        if($currentuser['rol'] == 'admin'){
            echo $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
            echo ' ';
            echo $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-info btn-sm fa fa-pencil']);
            echo ' ';
            echo $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'edit'], ['class' => 'btn btn-info btn-sm fa fa-trash']);
        }
    ?>
    <hr/>
    <div class="container">
        <div class="row">
            <?php foreach ($pplVisitors as $key => $pplVisitor): ?>
                <?php
                if (substr($pplVisitor->link, 0, 4) != "http"){
                  $pplVisitor->link = "http://".$pplVisitor->link;
                }
                ?>
                <?= $this->Html->link($pplVisitor->name . ' ' . $pplVisitor->lastname, $pplVisitor->link) ?>
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
<div class='container part'>
    <h4>
        <?= __('Past PhD Students') ?>
    </h4>
    <?php
        if($currentuser['rol'] == 'admin'){
            echo $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
        }
    ?>
    <hr/>
    <?php
    foreach ($pplPastPhds as $pplPastPhd): ?>
        <div class="container">
            <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-1">
                            <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'edit', $pplPastPhd->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                            <?= $this->Form->postLink(null, ['controller' => 'ppl_past_phds', 'action' => 'delete', $pplPastPhd->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-11 my-auto p-0">
                        <?php
                            echo h($pplPastPhd->name);
                            echo ', ';
                            echo h($pplPastPhd->lastname);
                            echo ' (';
                            echo h($pplPastPhd->thesis_date);
                            echo '). ';
                            echo h($pplPastPhd->thesis_name);
                            echo '. ';
                            if (substr($pplPastPhd->thesis_link, 0, 4) != "http"){
                              $pplPastPhd->thesis_link = "http://".$pplPastPhd->thesis_link;
                            }
                            echo $this->Html->link('info', $pplPastPhd->thesis_link, ['class' => 'btn btn-info btn-sm']);
                        ?>
                    </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<!-- Collaborators info -->
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
