<?php
  //$currentuser = $this->request->session()->read('Auth.User');
  use Cake\I18n\I18n;
?>

<footer style="background-color:red;" class="col-md-12 footer">
    <?= $this->Html->link('Login', ['controller' => 'ppl_users', 'action' => 'login']); ?>
    <?= $this->Html->link('Logout', ['controller' => 'ppl_users', 'action' => 'logot']); ?>
</footer>
