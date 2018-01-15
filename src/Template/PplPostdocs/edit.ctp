<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplPostdoc $pplPostdoc
 */
 foreach ($pplPostdocs as   $pplPost) {
     $postdocs[$pplPost->id] = $pplPost->name . ' ' . $pplPost->lastname;
 }
 $postdocs[0] = __('Select Postdoc');
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pplPostdoc, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'edit']) ?>
        <fieldset>
            <legend>
                <?= __('Edit Postdoc') ?>
                <?php
                    if(!$pplPostdoc->isNew()){
                        echo $this->Html->link(null, ['controller' => 'ppl_postdocs', 'action' => 'delete', $pplPostdoc->id], ['class' => 'btn btn-info btn-sm fa fa-trash']);
                    }
                ?>
                <?php $url = $this->Url->build(["controller" => "PplPostdocs","action" => "edit"]); ?>
                <?= $this->Form->select('postdocs', $postdocs, ['class' => 'form-control', 'default' => 0, 'disabled' => array(0), 'onchange' => "window.location.replace('$url'+ '/' +this.value)"]) ?>
            </legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('lastname', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
