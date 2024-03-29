<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
// TODO: Pasar todo el layout a CakePHP
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bewatermelon.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('popper.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="container">
    <div class="row">
        <?= $this->element('navbar') ?>

        <?= $this->element('header') ?>

        <article class="col-md-9">
            <p><?= $this->Form->button(__(' Back'), ['class' => 'btn btn-info btn-sm fa fa-arrow-left', 'onclick' => 'history.back()']) ?></p>

            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </article>

        <?= $this->element('navindex') ?>
        <?= $this->element('footer') ?>
    </div>
</body>
</html>
