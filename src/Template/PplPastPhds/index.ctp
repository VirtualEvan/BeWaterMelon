<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPastPhd[]|\Cake\Collection\CollectionInterface $pplPastPhds
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
    <h3>
        <?= __('Past PhD Students') ?>
        <?php
            if($currentuser['rol'] == 'admin'){
                echo $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
            }
        ?>    </h3>
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
</di>
