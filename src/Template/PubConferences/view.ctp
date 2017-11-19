<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubConference $pubConference
 */
?>
<div class="contanier">
    <h3><?= h($pubConference->name) ?></h3>
    <table class="table-striped">
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($pubConference->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pubConference->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($pubConference->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($pubConference->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($pubConference->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pubConference->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($pubConference->date) ?></td>
        </tr>
    </table>
</div>
