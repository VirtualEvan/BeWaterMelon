<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubConference[]|\Cake\Collection\CollectionInterface $pubConferences
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container'>
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
                                <?= $this->Html->link(null, ['controller' => 'pub_conferences', 'action' => 'delete', $pubConference->id], ['class' => 'btn btn-danger fa fa-trash']) ?>
                            </div>
                        </div>
                    <?php endif; ?>
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
</div>
