<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplVisitor $pplVisitor
 */
 foreach ($pplVisitors as   $pplVisit) {
     $visitors[$pplVisit->id] = $pplVisit->name . ' ' . $pplVisit->lastname;
 }
 $visitors[0] = __('Select Visitor');
?>
<div class="container">
    <div class="row">
        <?= $this->Form->create($pplVisitor, ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'edit']) ?>
        <fieldset>
            <legend><?= __('Edit Visitor') ?>
                <?php
                    if(!$pplVisitor->isNew()){
                        echo $this->Html->link(null, ['controller' => 'ppl_visitors', 'action' => 'delete', $pplVisitor->id], ['class' => 'btn btn-info btn-sm fa fa-trash']);
                    }
                ?>
                <?php $url = $this->Url->build(["controller" => "PplVisitors","action" => "edit"]); ?>
                <?= $this->Form->select('visitor', $visitors, ['class' => 'form-control', 'default' => 0, 'disabled' => array(0), 'onchange' => "window.location.replace('$url'+ '/' +this.value)"]) ?>
            </legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,20}']);
                echo $this->Form->control('lastname', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,20}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->control('doctor', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
