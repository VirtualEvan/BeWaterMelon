<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubBook $pubBook
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pub Book'), ['action' => 'edit', $pubBook->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pub Book'), ['action' => 'delete', $pubBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pubBook->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pub Books'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pub Book'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pubBooks view large-9 medium-8 columns content">
    <h3><?= h($pubBook->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Book Name') ?></th>
            <td><?= h($pubBook->book_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($pubBook->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Editorial') ?></th>
            <td><?= h($pubBook->editorial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($pubBook->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($pubBook->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn') ?></th>
            <td><?= h($pubBook->isbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($pubBook->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Physical Id') ?></th>
            <td><?= h($pubBook->physical_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pubBook->id) ?></td>
        </tr>
    </table>
</div>
