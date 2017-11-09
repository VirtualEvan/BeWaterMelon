<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActEditorialBoard[]|\Cake\Collection\CollectionInterface $actEditorialBoards
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Act Editorial Board'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="actEditorialBoards index large-9 medium-8 columns content">
    <h3><?= __('Act Editorial Boards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('journal_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('online_issn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('online_issn_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('h_index') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sjr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sjr_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sjr_quartile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('print_issn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impact_factor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impact_factor_quartile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impact_factor_year') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($actEditorialBoards as $actEditorialBoard): ?>
            <tr>
                <td><?= $this->Number->format($actEditorialBoard->id) ?></td>
                <td><?= h($actEditorialBoard->journal_name) ?></td>
                <td><?= h($actEditorialBoard->link) ?></td>
                <td><?= h($actEditorialBoard->online_issn) ?></td>
                <td><?= h($actEditorialBoard->online_issn_year) ?></td>
                <td><?= h($actEditorialBoard->h_index) ?></td>
                <td><?= $this->Number->format($actEditorialBoard->sjr) ?></td>
                <td><?= h($actEditorialBoard->sjr_year) ?></td>
                <td><?= h($actEditorialBoard->sjr_quartile) ?></td>
                <td><?= h($actEditorialBoard->print_issn) ?></td>
                <td><?= $this->Number->format($actEditorialBoard->impact_factor) ?></td>
                <td><?= h($actEditorialBoard->impact_factor_quartile) ?></td>
                <td><?= h($actEditorialBoard->impact_factor_year) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $actEditorialBoard->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actEditorialBoard->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actEditorialBoard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actEditorialBoard->id)]) ?>
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
