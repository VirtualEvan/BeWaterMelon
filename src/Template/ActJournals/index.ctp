<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActJournal[]|\Cake\Collection\CollectionInterface $actJournals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Act Journal'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="actJournals index large-9 medium-8 columns content">
    <h3><?= __('Act Journals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('online_issn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('online_issn_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impacr_factor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impact_factor_quartile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impact_factor_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('print_issn') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($actJournals as $actJournal): ?>
            <tr>
                <td><?= $this->Number->format($actJournal->id) ?></td>
                <td><?= h($actJournal->name) ?></td>
                <td><?= h($actJournal->link) ?></td>
                <td><?= h($actJournal->online_issn) ?></td>
                <td><?= h($actJournal->online_issn_year) ?></td>
                <td><?= $this->Number->format($actJournal->impacr_factor) ?></td>
                <td><?= h($actJournal->impact_factor_quartile) ?></td>
                <td><?= h($actJournal->impact_factor_year) ?></td>
                <td><?= h($actJournal->print_issn) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $actJournal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actJournal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actJournal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actJournal->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
