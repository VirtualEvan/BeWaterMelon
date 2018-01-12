<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPhd[]|\Cake\Collection\CollectionInterface $pplPhds
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
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
