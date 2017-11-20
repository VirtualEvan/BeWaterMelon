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
                        echo $this->Form->postLink(null, ['controller' => 'ppl_visitors', 'action' => 'delete', $pplVisitor->id], ['class' => 'btn btn-danger fa fa-trash']);
                    }
                ?>
                <?= $this->Form->select('visitor', $visitors, ['class' => 'form-control', 'default' => 0, 'disabled' => array(0), 'onchange' => "window.location.replace('/ppl-visitors/edit/'+this.value)"]) ?>
            </legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('lastname', ['class' => 'form-control', 'pattern' => '[A-Za-z ]{3,20}']);
                echo $this->Form->control('link', ['class' => 'form-control', 'pattern' => '(((https?)://)?(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)']);
                echo $this->Form->control('doctor', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
