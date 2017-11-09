<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal $pubJournal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pub Journal'), ['action' => 'edit', $pubJournal->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pub Journal'), ['action' => 'delete', $pubJournal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pubJournal->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pub Journals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pub Journal'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pubJournals view large-9 medium-8 columns content">
    <h3><?= h($pubJournal->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($pubJournal->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publication Name') ?></th>
            <td><?= h($pubJournal->publication_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pubJournal->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($pubJournal->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publication Date') ?></th>
            <td><?= h($pubJournal->publication_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online Issn') ?></th>
            <td><?= h($pubJournal->online_issn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($pubJournal->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Print Issn') ?></th>
            <td><?= h($pubJournal->print_issn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pubJournal->id) ?></td>
        </tr>
    </table>
</div>
