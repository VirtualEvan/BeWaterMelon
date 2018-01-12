<?php
  //$currentuser = $this->request->session()->read('Auth.User');
  use Cake\I18n\I18n;
?>

<nav class="col-md-3 sidebar-offcanvas">
    <form class="input-group mb-3">
        <input class="form-control" type="text" placeholder="<?= __('Search') ?>">
        <span class="input-group-btn">
            <button class="btn btn-outline-info" type="submit"><div class="fa fa-search"></div></button>
        </span>
    </form>

    <?php if (!empty($related)): ?>
        <div class="list-group">
            <?= $this->Html->link(__('Related'),['action' => '#'] , ['class' => 'list-group-item active']) ?>

            <?php
            foreach ($related as $rel){
                if(!array_key_exists("href", $rel)){
                    echo $this->Html->link($rel['name'],['controller' => $rel['controller']] , ['class' => 'list-group-item']);
                }
                else {
                    echo $this->Html->link($rel['name'],$rel['href'] , ['class' => 'list-group-item']);
                }
            }

            ?>
        </div>
    <?php endif; ?>
</nav>
