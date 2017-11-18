<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPastPhd[]|\Cake\Collection\CollectionInterface $pplPastPhds
 */
?>
<div class='container'>
    <h3>
        <?= __('Past PhD Students') ?>
        <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?>
    </h3>
    <?php // TODO: darle formato a esto
    foreach ($pplPastPhds as $pplPastPhd): ?>
        <div class="container">
            <div class="row">
                    <div class="col-md-1">
                        <div class="row">
                            <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'edit', $pplPastPhd->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                        </div>
                        <div class="row">
                            <?= $this->Html->link(null, ['controller' => 'ppl_past_phds', 'action' => 'delete', $pplPastPhd->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                        </div>
                    </div>
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
