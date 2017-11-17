<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal[]|\Cake\Collection\CollectionInterface $pubJournals
 */
?>
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
