<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResPatent $resPatent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Res Patent'), ['action' => 'edit', $resPatent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Res Patent'), ['action' => 'delete', $resPatent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resPatent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Res Patents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Res Patent'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="resPatents view large-9 medium-8 columns content">
    <h3><?= h($resPatent->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($resPatent->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($resPatent->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($resPatent->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($resPatent->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($resPatent->id) ?></td>
        </tr>
    </table>
</div>
