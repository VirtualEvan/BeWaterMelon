<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActEditorialBoard $actEditorialBoard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Act Editorial Board'), ['action' => 'edit', $actEditorialBoard->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Act Editorial Board'), ['action' => 'delete', $actEditorialBoard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actEditorialBoard->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Act Editorial Boards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Act Editorial Board'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="actEditorialBoards view large-9 medium-8 columns content">
    <h3><?= h($actEditorialBoard->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Journal Name') ?></th>
            <td><?= h($actEditorialBoard->journal_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($actEditorialBoard->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online Issn') ?></th>
            <td><?= h($actEditorialBoard->online_issn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online Issn Year') ?></th>
            <td><?= h($actEditorialBoard->online_issn_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('H Index') ?></th>
            <td><?= h($actEditorialBoard->h_index) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sjr Year') ?></th>
            <td><?= h($actEditorialBoard->sjr_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sjr Quartile') ?></th>
            <td><?= h($actEditorialBoard->sjr_quartile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Print Issn') ?></th>
            <td><?= h($actEditorialBoard->print_issn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Impact Factor Quartile') ?></th>
            <td><?= h($actEditorialBoard->impact_factor_quartile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Impact Factor Year') ?></th>
            <td><?= h($actEditorialBoard->impact_factor_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($actEditorialBoard->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sjr') ?></th>
            <td><?= $this->Number->format($actEditorialBoard->sjr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Impact Factor') ?></th>
            <td><?= $this->Number->format($actEditorialBoard->impact_factor) ?></td>
        </tr>
    </table>
</div>
