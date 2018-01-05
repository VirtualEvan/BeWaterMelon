<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal[]|\Cake\Collection\CollectionInterface $pubJournals
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>

<div class='container part'>
    <h4> <?= __('Journals') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_journals', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div id="PaginationJournals" class="pagination"></div>

    <div id="SearchresultJournals"></div>
</div>

<div id="hiddenresultJournals" class="container" style="display: none;">
<?php foreach ($pubJournals as $pubJournal): ?>
        <div class="row result pag<?= 2018-$pubJournal->publication_date ?>">
            <?php if($currentuser['rol'] == 'admin'): ?>
                <div class="col-md-1">
                        <?= $this->Html->link(null, ['controller' => 'pub_journals', 'action' => 'edit', $pubJournal->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                        <?= $this->Form->postLink(null, ['controller' => 'pub_journals', 'action' => 'delete', $pubJournal->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                </div>
            <?php endif; ?>
            <div class="col-md-11 my-auto p-0">
                <?php foreach($authors as $autor)
                    if(in_array($autor->id, explode(',', $pubJournal->author))){
                        echo $autor->name . ' ' . $autor->lastname;
                        echo ', ';
                    }
                ?>
                <?= '(' . h($pubJournal->publication_date) . '). ' ?>
                <?php
                if (substr($pubJournal->link, 0, 4) != "http"){
                  $pubJournal->link = "http://".$pubJournal->link;
                }
                ?>
                <?= $this->Html->link($pubJournal->publication_name . '. ', $pubJournal->link) ?>
                <?= h($pubJournal->name) . '. ' ?> <?= h($pubJournal->location) . '. ' ?>
                <?= __('e-ISSN') ?>: <?= h($pubJournal->online_issn) . '. ' ?>
                <?php if(!empty($pubJournal->print_issn)): echo __('ISSN:'); endif;?> <?= h($pubJournal->print_issn) . '. ' ?>
            </div>
        </div>
<?php endforeach; ?>
</div>

<?= $this->Html->script('paginate.js') ?>

<?= $this->Html->script('active-paginate-journals.js') ?>
