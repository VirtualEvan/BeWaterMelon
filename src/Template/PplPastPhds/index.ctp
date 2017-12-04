<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPastPhd[]|\Cake\Collection\CollectionInterface $pplPastPhds
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
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
