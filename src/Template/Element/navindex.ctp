<?php
  //$currentuser = $this->request->session()->read('Auth.User');
  use Cake\I18n\I18n;
?>

<nav class="col-md-3 sidebar-offcanvas">
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-outline-success fa fa-search" type="submit"></button>
    </form>

    <?php if (!empty($related)): ?>
        <div class="list-group">
            <?= $this->Html->link(__('Related'),['action' => '#'] , ['class' => 'list-group-item active']) ?>

            <?php
                foreach ($related as $rel){
                    echo $this->Html->link($rel['name'],['controller' => $rel['controller']] , ['class' => 'list-group-item']);
                }
            ?>
        </div>
    <?php endif; ?>
</nav>
