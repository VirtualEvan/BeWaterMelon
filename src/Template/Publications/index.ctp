<?php $currentuser = $this->request->session()->read('Auth.User'); ?>
<div class='container'>
    <!-- Journals info -->
    <h4> <?= __('Journals') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_journals', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($pubJournals as $pubJournal): ?>
            <div class="container">
                <div class="row">
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
                        <?= '(' . h($pubJournal->publication_date) . ') ' ?>
                        <a href="<?= h($pubJournal->link) ?>"><?= h($pubJournal->publication_name) ?> </a>
                        <?= h($pubJournal->name) ?> <?= h($pubJournal->location) ?>
                        <?= __('e-ISSN') ?>: <?= h($pubJournal->online_issn) ?>
                        <?php if(!empty($pubJournal->print_issn)): echo __('ISSN:'); endif;?> <?= h($pubJournal->print_issn) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Conferences info -->
    <h4> <?= __('Conferences') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_conferences', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($pubConferences as $pubConference): ?>
            <div class="container">
                <div class="row">
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
                        <a href="<?= h($pubConference->link) ?>"> <?= h($pubConference->name) ?> </a>
                        <?= h($pubConference->date) ?> <?= h($pubConference->city) ?>
                        <?= h($pubConference->country) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Books info -->
    <h4> <?= __('Books') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'add'], ['class' => 'btn btn-info btn-smbtn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($pubBooks as $pubBook): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-1">
                                <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'edit', $pubBook->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'pub_books', 'action' => 'delete', $pubBook->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-11 my-auto p-0">
                        <?php foreach($authors as $autor)
                            if(in_array($autor->id, explode(',', $pubBook->author))){
                                echo $this->Html->link($autor->name . ' ' . $autor->lastname, ['link' => $pubBook->author]);
                                echo ', ';
                            }
                        ?>
                        <?= h($pubBook->editorial) ?> <?= h($pubBook->year) ?>
                        <?= h($pubBook->country) ?> <?= __('ISBN') ?>: <?= h($pubBook->isbn) ?>
                        <?php if(!empty($pubBook->physical_identifier)): echo __('Physical identifier:'); endif;?> <?= h($pubBook->physical_identifier) ?>
                    </div>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
