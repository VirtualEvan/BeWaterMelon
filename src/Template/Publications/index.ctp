<?php $currentuser = $this->request->session()->read('Auth.User'); ?>
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
                <?php foreach($pplUsers as $pplUser)
                    if(in_array($pplUser->id, explode(',', $pubJournal->author))){
                        echo $pplUser->name . ' ' . $pplUser->lastname;
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

<!-- Conferences info -->
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
                <?php foreach($pplUsers as $pplUser)
                    if(in_array($pplUser->id, explode(',', $pubConference->author))){
                        echo $pplUser->name . ' ' . $pplUser->lastname;
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

<!-- Books info -->
<div class='container part'>
    <h4> <?= __('Books') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div id="PaginationBooks" class="pagination"></div>
    <div id="SearchresultBooks"></div>
</div>

<div id="hiddenresultBooks" class="container" style="display: none;">
    <?php foreach ($pubBooks as $pubBook): ?>
        <div class="row result pag<?= 2018-$pubBook->year ?>">
            <?php if($currentuser['rol'] == 'admin'): ?>
                <div class="col-md-1">
                        <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'edit', $pubBook->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                        <?= $this->Form->postLink(null, ['controller' => 'pub_books', 'action' => 'delete', $pubBook->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                </div>
            <?php endif; ?>
            <div class="col-md-11 my-auto p-0">
                <?php foreach($pplUsers as $pplUser)
                    if(in_array($pplUser->id, explode(',', $pubBook->author))){
                        echo $this->Html->link($pplUser->name . ' ' . $pplUser->lastname, ['controller' => 'ppl_users', 'action' => 'view', $pplUser->id]);
                        echo ', ';
                    }
                ?>
                <?= h($pubBook->editorial) . '. ' ?> <?= h($pubBook->year) . '. ' ?>
                <?= h($pubBook->country) . '. ' ?> <?= __('ISBN') ?>: <?= h($pubBook->isbn) . '. ' ?>
                <?php if(!empty($pubBook->physical_identifier)): echo __('Physical identifier:'); endif;?> <?= h($pubBook->physical_identifier) . '. ' ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?= $this->Html->script('paginate.js') ?>

<?= $this->Html->script('active-paginate-journals.js') ?>
<?= $this->Html->script('active-paginate-conferences.js') ?>
<?= $this->Html->script('active-paginate-books.js') ?>
