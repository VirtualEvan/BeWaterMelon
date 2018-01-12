<?php
  //$currentuser = $this->request->session()->read('Auth.User');
  use Cake\I18n\I18n;

  $active = array(
      'home' => '',
      'People' => '',
      'PrePresses' => '',
      'Publications' => '',
      'Activities' => '',
      'Research' => '',
      'ProProducts' => '',
      'Courses' => '',
      'Collaborations' => '',
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
              <?= $this->Html->link(__('Press'), ['controller' => 'pre_presses','action' => 'index'], ['class' => 'nav-link ' . $active['PrePresses']]) ?>
          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('Publications'), ['controller' => 'publications','action' => 'index'], ['class' => 'nav-link ' . $active['Publications']]) ?>
          </li>
          <li class="nav-item">
              <?= $this->Html->link(__('Activities'), ['controller' => 'activities','action' => 'index'], ['class' => 'nav-link ' . $active['Activities']]) ?>
          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('R & D'), ['controller' => 'research','action' => 'index'], ['class' => 'nav-link ' . $active['Research']]) ?>
          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('Products'), ['controller' => 'pro_products','action' => 'index'], ['class' => 'nav-link ' . $active['ProProducts']]) ?>
          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('Teaching'), ['controller' => 'courses','action' => 'index'], ['class' => 'nav-link ' . $active['Courses']]) ?>
          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('Collaborations'), ['controller' => 'collaborations','action' => 'index'], ['class' => 'nav-link ' . $active['Collaborations']]) ?>
          </li>
    </ul>
</nav>
