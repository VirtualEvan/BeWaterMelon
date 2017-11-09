<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrePress $prePress
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pre Press'), ['action' => 'edit', $prePress->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pre Press'), ['action' => 'delete', $prePress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prePress->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pre Presses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pre Press'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prePresses view large-9 medium-8 columns content">
    <h3><?= h($prePress->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($prePress->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source') ?></th>
            <td><?= h($prePress->source) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($prePress->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prePress->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($prePress->date) ?></td>
        </tr>
    </table>
</div>
