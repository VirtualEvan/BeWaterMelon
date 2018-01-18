<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplCollaborator $pplCollaborator
 */
//
foreach ($pplCollaborators as   $pplCol) {
    $collaborators[$pplCol->id] = $pplCol->name . ' ' . $pplCol->lastname;
}
$collaborators[0] = __('Select Collaborator');
?>
<div class="container">
    <div class="row">

        <?= $this->Form->create($pplCollaborator , ['templates' => ['inputContainer' => '<div class="form-group" >{{content}}</div>'], 'name' => 'edit']) ?>
        <fieldset>
            <legend>
                <?= __('Edit Collaborator') ?>
                <?php
                    if(!$pplCollaborator->isNew()){
                        echo $this->Html->link(null, ['controller' => 'ppl_collaborators', 'action' => 'delete', $pplCollaborator->id], ['class' => 'btn btn-info btn-sm fa fa-trash']);
                    }
                ?>
                <?php $url = $this->Url->build(["controller" => "PplCollaborators","action" => "edit"]); ?>
                <?= $this->Form->select('collaborator', $collaborators, ['class' => 'form-control', 'default' => 0, 'disabled' => array(0), 'onchange' => "window.location.replace('$url'+ '/' +this.value)"]) ?>
            </legend>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,20}']);
                echo $this->Form->control('lastname', ['class' => 'form-control', 'pattern' => '[A-Za-záéíóúüñ ]{3,20}']);
                echo $this->Form->control('doctor', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
