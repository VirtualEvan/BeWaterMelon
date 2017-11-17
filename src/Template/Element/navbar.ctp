<?php
  //$currentuser = $this->request->session()->read('Auth.User');
  use Cake\I18n\I18n;
?>

<nav class="navbar navbar-expand-lg navbar-inverse bg-inverse">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"><?= __('Home') ?></a>
          </li>
          <li class="nav-item">
            <p class="nav-link"><?php echo $this->Html->link(__('People'), ['controller' => 'ppl-users','action' => 'index']); ?></p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?= __('Press') ?></a>
          </li>
          <li class="nav-item">
            <p class="nav-link"><?php echo $this->Html->link(__('Publications'), ['controller' => 'publications','action' => 'index']); ?></p>
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
    </div>
</nav>
