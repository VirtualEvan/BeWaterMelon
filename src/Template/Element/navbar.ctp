<?php
  //$currentuser = $this->request->session()->read('Auth.User');
  use Cake\I18n\I18n;

  $active = array(
      'home' => '',
      'People' => '',
      'Press' => '',
      'Publications' => '',
      'Pctivities' => '',
      'rd' => '',
      'Software' => '',
      'Teaching' => '',
      'Colaborations' => '',
  );
  $active[$this->request->params['controller']] = 'active'
?>

<nav class='mx-auto'>
    <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="#"><?= __('Home') ?></a>
          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('People'), ['controller' => 'people','action' => 'index'], ['class' => 'nav-link ' . $active['People']]) ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?= __('Press') ?></a>
          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('Publications'), ['controller' => 'publications','action' => 'index'], ['class' => 'nav-link ' . $active['Publications']]) ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?= __('Activities') ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?= __('R & D') ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?= __('Software') ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?= __('Teaching') ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?= __('Colaborations') ?></a>
          </li>
    </ul>
</nav>
