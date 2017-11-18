<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPastPhd $pplPastPhd
 */
?>

<div class="container">
    <h3><?= h($pplPastPhd->name) ?></h3>
    <table class="table-striped">
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
