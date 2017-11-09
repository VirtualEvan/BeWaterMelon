<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColMember $colMember
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Col Member'), ['action' => 'edit', $colMember->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Col Member'), ['action' => 'delete', $colMember->id], ['confirm' => __('Are you sure you want to delete # {0}?', $colMember->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Col Members'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Col Member'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colMembers view large-9 medium-8 columns content">
    <h3><?= h($colMember->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($colMember->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($colMember->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($colMember->id) ?></td>
        </tr>
    </table>
</div>
