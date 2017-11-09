<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActConference $actConference
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Act Conference'), ['action' => 'edit', $actConference->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Act Conference'), ['action' => 'delete', $actConference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actConference->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Act Conferences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Act Conference'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Act Conference Years'), ['controller' => 'ActConferenceYears', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Act Conference Year'), ['controller' => 'ActConferenceYears', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="actConferences view large-9 medium-8 columns content">
    <h3><?= h($actConference->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Acronym') ?></th>
            <td><?= h($actConference->acronym) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($actConference->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($actConference->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($actConference->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Act Conference Years') ?></h4>
        <?php if (!empty($actConference->act_conference_years)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Act Conference Id') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($actConference->act_conference_years as $actConferenceYears): ?>
            <tr>
                <td><?= h($actConferenceYears->act_conference_id) ?></td>
                <td><?= h($actConferenceYears->year) ?></td>
                <td><?= h($actConferenceYears->link) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ActConferenceYears', 'action' => 'view', $actConferenceYears->act_conference_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ActConferenceYears', 'action' => 'edit', $actConferenceYears->act_conference_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ActConferenceYears', 'action' => 'delete', $actConferenceYears->act_conference_id], ['confirm' => __('Are you sure you want to delete # {0}?', $actConferenceYears->act_conference_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
