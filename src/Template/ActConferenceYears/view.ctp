<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActConferenceYear $actConferenceYear
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Act Conference Year'), ['action' => 'edit', $actConferenceYear->act_conference_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Act Conference Year'), ['action' => 'delete', $actConferenceYear->act_conference_id], ['confirm' => __('Are you sure you want to delete # {0}?', $actConferenceYear->act_conference_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Act Conference Years'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Act Conference Year'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Act Conferences'), ['controller' => 'ActConferences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Act Conference'), ['controller' => 'ActConferences', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="actConferenceYears view large-9 medium-8 columns content">
    <h3><?= h($actConferenceYear->act_conference_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Act Conference') ?></th>
            <td><?= $actConferenceYear->has('act_conference') ? $this->Html->link($actConferenceYear->act_conference->name, ['controller' => 'ActConferences', 'action' => 'view', $actConferenceYear->act_conference->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($actConferenceYear->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($actConferenceYear->link) ?></td>
        </tr>
    </table>
</div>
