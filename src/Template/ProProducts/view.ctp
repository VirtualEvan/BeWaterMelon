<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProProduct $proProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pro Product'), ['action' => 'edit', $proProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pro Product'), ['action' => 'delete', $proProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pro Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pro Product'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="proProducts view large-9 medium-8 columns content">
    <h3><?= h($proProduct->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($proProduct->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($proProduct->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($proProduct->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Detailed Description') ?></th>
            <td><?= h($proProduct->detailed_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($proProduct->id) ?></td>
        </tr>
    </table>
</div>
