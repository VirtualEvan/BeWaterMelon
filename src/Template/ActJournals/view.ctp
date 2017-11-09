<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActJournal $actJournal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Act Journal'), ['action' => 'edit', $actJournal->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Act Journal'), ['action' => 'delete', $actJournal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actJournal->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Act Journals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Act Journal'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="actJournals view large-9 medium-8 columns content">
    <h3><?= h($actJournal->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($actJournal->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($actJournal->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online Issn') ?></th>
            <td><?= h($actJournal->online_issn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online Issn Year') ?></th>
            <td><?= h($actJournal->online_issn_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Impact Factor Quartile') ?></th>
            <td><?= h($actJournal->impact_factor_quartile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Impact Factor Year') ?></th>
            <td><?= h($actJournal->impact_factor_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Print Issn') ?></th>
            <td><?= h($actJournal->print_issn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($actJournal->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Impacr Factor') ?></th>
            <td><?= $this->Number->format($actJournal->impacr_factor) ?></td>
        </tr>
    </table>
</div>
