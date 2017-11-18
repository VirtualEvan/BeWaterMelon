<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPhd $pplPhd
 */
?>
<div class="container">
    <h3><?= h($pplPhd->name) ?></h3>
    <table class="table-striped">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pplPhd->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($pplPhd->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thesis Name') ?></th>
            <td><?= h($pplPhd->thesis_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pplPhd->id) ?></td>
        </tr>
    </table>
</div>
