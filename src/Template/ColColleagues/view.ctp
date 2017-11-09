<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColColleague $colColleague
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Col Colleague'), ['action' => 'edit', $colColleague->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Col Colleague'), ['action' => 'delete', $colColleague->id], ['confirm' => __('Are you sure you want to delete # {0}?', $colColleague->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Col Colleagues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Col Colleague'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colColleagues view large-9 medium-8 columns content">
    <h3><?= h($colColleague->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($colColleague->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= h($colColleague->doctor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= h($colColleague->department) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($colColleague->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= h($colColleague->company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($colColleague->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($colColleague->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($colColleague->id) ?></td>
        </tr>
    </table>
</div>
