<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PubJournal $pubJournal
 */
?>
<div class="container">
    <h3><?= h($pubJournal->name) ?></h3>
    <table class="table-striped">
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($pubJournal->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publication Name') ?></th>
            <td><?= h($pubJournal->publication_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pubJournal->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($pubJournal->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publication Date') ?></th>
            <td><?= h($pubJournal->publication_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online Issn') ?></th>
            <td><?= h($pubJournal->online_issn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($pubJournal->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Print Issn') ?></th>
            <td><?= h($pubJournal->print_issn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pubJournal->id) ?></td>
        </tr>
    </table>
</div>
