<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ColCompany $colCompany
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Col Company'), ['action' => 'edit', $colCompany->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Col Company'), ['action' => 'delete', $colCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $colCompany->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Col Companies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Col Company'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colCompanies view large-9 medium-8 columns content">
    <h3><?= h($colCompany->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($colCompany->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($colCompany->id) ?></td>
        </tr>
    </table>
</div>
