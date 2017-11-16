<div class="col-md-4 col-md-offset-4">
	<div class="card text-center">
	  	<div class="card-header bg-success">
	    	<h3 class="card-title"><?= __('Please sign in') ?></h3>
	 	</div>
	  	<div class="card-body">
			<?php // TODO: mirar campo hidden ?>
            <?= $this->Form->create(null, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'],'url' => ['controller' => 'ppl_users', 'action' => 'login']]) ?>
                <fieldset class="form-group">
                    <?= $this->Form->input('email', array('class' => 'form-control', 'type' => 'email', 'placeholder' => __('E-mail'), 'label' => false)) ?>
                    <?= $this->Form->input('password', array('class' => 'form-control', 'type' => 'password', 'placeholder' => __('Password'), 'label' => false)) ?>
                    <?= $this->Html->div('submit', $this->Form->button(__('Login'), array('class' => 'btn btn-lg btn-success btn-block'))) ?>
                </fieldset>
            <?= $this->Form->end() ?>
	    </div>
	</div>
</div>
