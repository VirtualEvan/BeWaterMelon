<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubConference $pubConference
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pub Conference'), ['action' => 'edit', $pubConference->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pub Conference'), ['action' => 'delete', $pubConference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pubConference->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pub Conferences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pub Conference'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pubConferences view large-9 medium-8 columns content">
    <h3><?= h($pubConference->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($pubConference->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pubConference->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($pubConference->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($pubConference->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($pubConference->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pubConference->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($pubConference->date) ?></td>
        </tr>
    </table>
</div>
