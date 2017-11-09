<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPastPhd $pplPastPhd
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ppl Past Phd'), ['action' => 'edit', $pplPastPhd->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ppl Past Phd'), ['action' => 'delete', $pplPastPhd->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplPastPhd->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ppl Past Phds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ppl Past Phd'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pplPastPhds view large-9 medium-8 columns content">
    <h3><?= h($pplPastPhd->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pplPastPhd->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($pplPastPhd->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thesis Date') ?></th>
            <td><?= h($pplPastPhd->thesis_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thesis Name') ?></th>
            <td><?= h($pplPastPhd->thesis_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thesis Link') ?></th>
            <td><?= h($pplPastPhd->thesis_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pplPastPhd->id) ?></td>
        </tr>
    </table>
</div>
