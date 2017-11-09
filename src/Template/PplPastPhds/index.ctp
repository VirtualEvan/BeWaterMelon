<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPastPhd[]|\Cake\Collection\CollectionInterface $pplPastPhds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ppl Past Phd'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pplPastPhds index large-9 medium-8 columns content">
    <h3><?= __('Ppl Past Phds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('thesis_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('thesis_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('thesis_link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pplPastPhds as $pplPastPhd): ?>
            <tr>
                <td><?= $this->Number->format($pplPastPhd->id) ?></td>
                <td><?= h($pplPastPhd->name) ?></td>
                <td><?= h($pplPastPhd->lastname) ?></td>
                <td><?= h($pplPastPhd->thesis_date) ?></td>
                <td><?= h($pplPastPhd->thesis_name) ?></td>
                <td><?= h($pplPastPhd->thesis_link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pplPastPhd->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pplPastPhd->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pplPastPhd->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplPastPhd->id)]) ?>
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
