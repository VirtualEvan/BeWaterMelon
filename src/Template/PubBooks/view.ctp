<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubBook $pubBook
 */
?>
<div class="contanier">
    <h3><?= h($pubBook->id) ?></h3>
    <table class="table-striped">
        <tr>
            <th scope="row"><?= __('Book Name') ?></th>
            <td><?= h($pubBook->book_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($pubBook->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Editorial') ?></th>
            <td><?= h($pubBook->editorial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($pubBook->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($pubBook->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn') ?></th>
            <td><?= h($pubBook->isbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($pubBook->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Physical Identifier') ?></th>
            <td><?= h($pubBook->physical_identifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pubBook->id) ?></td>
        </tr>
    </table>
</div>
