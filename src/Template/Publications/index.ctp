<?php $currentuser = $this->request->session()->read('Auth.User'); ?>
<div class='container'>
    <!-- Journals info -->
    <h3> <?= __('Journals') ?> </h3>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_journals', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
    }
    ?>
    <div class="row">
        <?php foreach ($pubJournals as $pubJournal): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-2">
                            <div class="row">
                                <?= $this->Html->link(null, ['controller' => 'pub_journals', 'action' => 'edit', $pubJournal->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'pub_journals', 'action' => 'delete', $pubJournal->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
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
    <h3> <?= __('Conferences') ?> </h3>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_conferences', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
    }
    ?>
    <div class="row">
        <?php foreach ($pubConferences as $pubConference): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-2">
                            <div class="row">
                                <?= $this->Html->link(null, ['controller' => 'pub_conferences', 'action' => 'edit', $pubConference->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'pub_conferences', 'action' => 'delete', $pubConference->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-12">
                        <div class="row">
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
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Books info -->
    <h3> <?= __('Books') ?> </h3>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']);
    }
    ?>
    <div class="row">
        <?php foreach ($pubBooks as $pubBook): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin'): ?>
                        <div class="col-md-2">
                            <div class="row">
                                <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'edit', $pubBook->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'pub_books', 'action' => 'delete', $pubBook->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-12">
                        <div class="row">
                            <?php foreach($authors as $autor)
                                if(in_array($autor->id, explode(',', $pubBook->author))){
                                    echo $this->Html->link($autor->name . ' ' . $autor->lastname, ['link' => $pubBook->author]);
                                    echo ', ';
                                }
                            ?>
                            <?= h($pubBook->editorial) ?> <?= h($pubBook->year) ?>
                            <?= h($pubBook->country) ?> <?= h($pubBook->isbn) ?>
                            <?= h($pubBook->physical_identifier) ?>
                        </div>
                    </div>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
