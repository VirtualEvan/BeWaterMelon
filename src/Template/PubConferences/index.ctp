<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubConference[]|\Cake\Collection\CollectionInterface $pubConferences
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>

<div class='container part'>
    <h4> <?= __('Conferences') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_conferences', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div id="PaginationConferences" class="pagination"></div>
    <div id="SearchresultConferences"></div>
</div>

<div id="hiddenresultConferences" class="container" style="display: none;">
    <?php foreach ($pubConferences as $pubConference): ?>
        <div class="row result pag<?= 2018-date('Y',strtotime($pubConference->date)) ?>">
            <?php if($currentuser['rol'] == 'admin'): ?>
                <div class="col-md-1">
                        <?= $this->Html->link(null, ['controller' => 'pub_conferences', 'action' => 'edit', $pubConference->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                        <?= $this->Form->postLink(null, ['controller' => 'pub_conferences', 'action' => 'delete', $pubConference->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                </div>
            <?php endif; ?>
            <div class="col-md-11 my-auto p-0">
                <?php foreach($authors as $autor)
                    if(in_array($autor->id, explode(',', $pubConference->author))){
                        echo $autor->name . ' ' . $autor->lastname;
                        echo ', ';
                    }
                ?>
                <?php
                if (substr($pubConference->link, 0, 4) != "http"){
                  $pubConference->link = "http://".$pubConference->link;
                }
                ?>
                <?= $this->Html->link($pubConference->name . '. ', $pubConference->link) ?>
                <?= h($pubConference->date) . '. ' ?> <?= h($pubConference->city) . '. ' ?>
                <?= h($pubConference->country) . '. ' ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->Html->script('paginate.js') ?>

<?= $this->Html->script('active-paginate-conferences.js') ?>
