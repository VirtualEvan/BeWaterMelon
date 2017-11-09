<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPhd $pplPhd
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ppl Phd'), ['action' => 'edit', $pplPhd->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ppl Phd'), ['action' => 'delete', $pplPhd->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplPhd->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ppl Phds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ppl Phd'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pplPhds view large-9 medium-8 columns content">
    <h3><?= h($pplPhd->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pplPhd->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($pplPhd->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thesis Name') ?></th>
            <td><?= h($pplPhd->thesis_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pplPhd->id) ?></td>
        </tr>
    </table>
</div>
