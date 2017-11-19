<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal[]|\Cake\Collection\CollectionInterface $pubJournals
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
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
                            <?= $this->Html->link(null, ['controller' => 'pub_journals', 'action' => 'delete', $pubJournal->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                        </div>
                    </div>
                <?php endif; ?>
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
