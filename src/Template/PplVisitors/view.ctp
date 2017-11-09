<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplVisitor $pplVisitor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ppl Visitor'), ['action' => 'edit', $pplVisitor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ppl Visitor'), ['action' => 'delete', $pplVisitor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplVisitor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ppl Visitors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ppl Visitor'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pplVisitors view large-9 medium-8 columns content">
    <h3><?= h($pplVisitor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pplVisitor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($pplVisitor->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($pplVisitor->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= h($pplVisitor->doctor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pplVisitor->id) ?></td>
        </tr>
    </table>
</div>
