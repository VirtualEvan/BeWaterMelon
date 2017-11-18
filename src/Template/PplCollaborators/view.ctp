<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplCollaborator $pplCollaborator
 */
?>

<div class="container">
    <h3><?= h($pplCollaborator->name) ?></h3>
    <table class="table-striped">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pplCollaborator->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($pplCollaborator->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pplCollaborator->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= $pplCollaborator->doctor ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
