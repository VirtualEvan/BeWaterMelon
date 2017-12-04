<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser $pplUser
 */
?>

<div class="container">
    <h3><?= h($pplUser->name) ?></h3>
    <table class="table-striped">
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
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($pplUser->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($pplUser->link) ?></td>
        </tr>
    </table>

    <?php if (!empty($pplUser->cou_subjects)): ?>
        <div class="container">
            <h4><?= __('Related Cou Subjects') ?></h4>
            <table class="table-striped">
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
        </div>
    <?php endif; ?>
</div>
