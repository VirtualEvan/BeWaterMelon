<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColInstitution $colInstitution
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Col Institution'), ['action' => 'edit', $colInstitution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Col Institution'), ['action' => 'delete', $colInstitution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $colInstitution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Col Institutions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Col Institution'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colInstitutions view large-9 medium-8 columns content">
    <h3><?= h($colInstitution->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($colInstitution->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($colInstitution->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($colInstitution->id) ?></td>
        </tr>
    </table>
</div>
