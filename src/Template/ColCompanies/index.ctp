<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColCompany[]|\Cake\Collection\CollectionInterface $colCompanies
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Col Company'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="colCompanies index large-9 medium-8 columns content">
    <h3><?= __('Col Companies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colCompanies as $colCompany): ?>
            <tr>
                <td><?= $this->Number->format($colCompany->id) ?></td>
                <td><?= h($colCompany->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $colCompany->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $colCompany->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $colCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $colCompany->id)]) ?>
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
