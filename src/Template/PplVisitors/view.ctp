<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplVisitor $pplVisitor
 */
?>
<div class="container">
    <h3><?= h($pplVisitor->name) ?></h3>
    <table class="table-striped">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pplVisitor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($pplVisitor->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($pplVisitor->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pplVisitor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= $pplVisitor->doctor ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
