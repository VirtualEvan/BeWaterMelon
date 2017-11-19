<!-- Journals info -->
<h3> <?= __('Journals') ?> <?= $this->Html->link(null, ['controller' => 'pub_journals', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?> </h3>
<div class="row">
    <?php foreach ($pubJournals as $pubJournal): ?>
        <div class="container">
            <div class="row">
                    <div class="col-md-2">
                        <div class="row">
                            <?= $this->Html->link(null, ['controller' => 'pub_journals', 'action' => 'edit', $pubJournal->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                            <?= $this->Html->link(null, ['controller' => 'pub_journals', 'action' => 'delete', $pubJournal->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <?= h($pubJournal->author) ?>
                            <a href="<?= h($pubJournal->link) ?>"><?= h($pubJournal->publication_name) ?></a>
                            <?= h($pubJournal->name) ?> <?= h($pubJournal->location) ?>
                            <?= h($pubJournal->publication_date) ?> <?= h($pubJournal->online_issn) ?>
                            <?= h($pubJournal->print_issn) ?>
                        </div>
                    </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Conferences info -->
<h3> <?= __('Conferences') ?> <?= $this->Html->link(null, ['controller' => 'pub_conferences', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?> </h3>
<div class="row">
    <?php foreach ($pubConferences as $pubConference): ?>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="row">
                        <?= $this->Html->link(null, ['controller' => 'pub_conferences', 'action' => 'edit', $pubConference->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                        <?= $this->Html->link(null, ['controller' => 'pub_conferences', 'action' => 'delete', $pubConference->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <?= h($pubConference->author) ?>
                        <a href="<?= h($pubConference->link) ?>"><?= h($pubConference->name) ?></a>
                        <?= h($pubConference->date) ?> <?= h($pubConference->city) ?>
                        <?= h($pubConference->country) ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Books info -->
<h3> <?= __('Books') ?> <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'add'], ['class' => 'btn btn-success fa fa-plus']) ?> </h3>
<div class="row">
    <?php foreach ($pubBooks as $pubBook): ?>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="row">
                        <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'edit', $pubBook->id], ['class' => 'btn btn-warning fa fa-pencil']) ?>
                        <?= $this->Html->link(null, ['controller' => 'pub_books', 'action' => 'delete', $pubBook->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <?= h($pubBook->book_name) ?>
                        <a href="<?= h($pubBook->link) ?>"><?= h($pubBook->author) ?></a>
                        <?= h($pubBook->editorial) ?> <?= h($pubBook->year) ?>
                        <?= h($pubBook->country) ?> <?= h($pubBook->isbn) ?>
                        <?= h($pubBook->physical_identifier) ?>
                    </div>
                </div>
        </div>
        </div>
    <?php endforeach; ?>
</div>
