<!-- The Modal -->
<div class="modal-dialog">
	<div class="modal-content">

	  <!-- Modal Header -->
	  <div class="modal-header bg-secondary">
	    <h4 class="modal-title"> <?= __('Please sign in') ?> </h4>
	    <button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>

	  <!-- Modal body -->
	  <div class="modal-body">
	      <?= $this->Form->create(null, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'],'url' => ['controller' => 'ppl_users', 'action' => 'login']]) ?>
	          <?= $this->Form->input('email', array('class' => 'form-control', 'type' => 'email', 'placeholder' => __('E-mail'), 'label' => false)) ?>
	          <?= $this->Form->input('password', array('class' => 'form-control', 'type' => 'password', 'placeholder' => __('Password'), 'label' => false)) ?>
	  </div>

	  <!-- Modal footer -->
	  <div class="modal-footer">
	          <?= $this->Html->div('submit', $this->Form->button(__('Login'), array('class' => 'btn btn-info'))) ?>
	      <?= $this->Form->end() ?>

	    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <?= __('Close') ?> </button>
	  </div>

	</div>
</div>
