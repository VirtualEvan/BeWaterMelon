<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal[]|\Cake\Collection\CollectionInterface $pubJournals
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
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
</div>
