<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser $pplUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ppl User'), ['action' => 'edit', $pplUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ppl User'), ['action' => 'delete', $pplUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pplUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ppl Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ppl User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cou Subjects'), ['controller' => 'CouSubjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cou Subject'), ['controller' => 'CouSubjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pplUsers view large-9 medium-8 columns content">
    <h3><?= h($pplUser->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pplUser->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($pplUser->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rol') ?></th>
            <td><?= h($pplUser->rol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($pplUser->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($pplUser->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bio') ?></th>
            <td><?= h($pplUser->bio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($pplUser->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($pplUser->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($pplUser->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pplUser->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cou Subjects') ?></h4>
        <?php if (!empty($pplUser->cou_subjects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Ppl User Id') ?></th>
                <th scope="col"><?= __('Abbreviation') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pplUser->cou_subjects as $couSubjects): ?>
            <tr>
                <td><?= h($couSubjects->id) ?></td>
                <td><?= h($couSubjects->name) ?></td>
                <td><?= h($couSubjects->ppl_user_id) ?></td>
                <td><?= h($couSubjects->abbreviation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CouSubjects', 'action' => 'view', $couSubjects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CouSubjects', 'action' => 'edit', $couSubjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CouSubjects', 'action' => 'delete', $couSubjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couSubjects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
