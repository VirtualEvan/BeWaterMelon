<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColGroup $colGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Col Group'), ['action' => 'edit', $colGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Col Group'), ['action' => 'delete', $colGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $colGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Col Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Col Group'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colGroups view large-9 medium-8 columns content">
    <h3><?= h($colGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($colGroup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= h($colGroup->department) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= h($colGroup->company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($colGroup->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($colGroup->id) ?></td>
        </tr>
    </table>
</div>
