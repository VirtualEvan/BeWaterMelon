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
  $active[$this->request->params['controller']] = 'active';
?>
<nav class="col-md-3 sidebar-offcanvas">
    <?= $this->Form->create(null, ['templates' => ['inputContainer' => '{{content}}'], 'class' => 'input-group mb-3', 'url' => ['controller' => $this->request->params['controller'], 'action' => 'search']]); ?>
        <div class="input-group mb-3">
            <?= $this->Form->input('search', array(
                'label' => false,
                'placeholder' => __('Search'),
                'class' => 'form-control'
            )) ?>
            <span class="input-group-btn">
                <?= $this->Form->button("<div class=\"fa fa-search\"></div>", array('class' => 'btn btn-outline-info', 'templates' => ['inputContainer' => "{{content}}"])); ?>
            </span>
        </div>
    <?= $this->Form->end(); ?>

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
