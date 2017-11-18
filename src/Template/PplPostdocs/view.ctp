<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPostdoc $pplPostdoc
 */
?>
<div class="container">
    <h3><?= h($pplPostdoc->name) ?></h3>
    <table class="table-striped">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pplPostdoc->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($pplPostdoc->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pplPostdoc->id) ?></td>
        </tr>
    </table>
</div>
