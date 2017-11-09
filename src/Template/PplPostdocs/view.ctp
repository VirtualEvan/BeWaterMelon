<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPostdoc $pplPostdoc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ppl Postdoc'), ['action' => 'edit', $pplPostdoc->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ppl Postdoc'), ['action' => 'delete', $pplPostdoc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplPostdoc->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ppl Postdocs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ppl Postdoc'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pplPostdocs view large-9 medium-8 columns content">
    <h3><?= h($pplPostdoc->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pplPostdoc->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($pplPostdoc->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pplPostdoc->id) ?></td>
        </tr>
    </table>
</div>
