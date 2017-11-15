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
<<<<<<< HEAD
    <?=  $this->Html->css('cake.css') ?>
    <!--<? //$this->Html->css('cake.css') ?> -->
=======
    <?= $this->Html->css('bake.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
>>>>>>> afd7884098ab4f4f5fe8d223ed83f18f359d956e

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<<<<<<< HEAD
<body class="container">
    <div class="row">
        <?= $this->element('navbar') ?>

        <?= $this->element('header') ?>

        <article class="col-md-9" style="background-color:pink;">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </article>
=======
<body>
    <?= $this->element('navbar') ?>

    <?= $this->element('header') ?>

    <?= $this->element('navindex') ?>

    <article class="container">
      <?= $this->fetch('content') ?>
    </article>

    <?= $this->element('footer') ?>
>>>>>>> afd7884098ab4f4f5fe8d223ed83f18f359d956e

        <?= $this->element('navindex') ?>
        <?= $this->element('footer') ?>
    </div>
</body>
</html>
