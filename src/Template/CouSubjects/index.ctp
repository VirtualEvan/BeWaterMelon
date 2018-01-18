<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouSubject[]|\Cake\Collection\CollectionInterface $couSubjects
 */
?>
<?php $currentuser = $this->request->session()->read('Auth.User'); ?>
<div class='container part'>
    <h4> <?= __('Subjects') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
      echo $this->Html->link(null, ['controller' => 'cou_subjects', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    
    <?php foreach($couSubjects as $couSubject): ?>
        <div class="row">
            <div class="col-md-11 my-auto p-0">
                <?= $this->Html->link(null, ['controller' => 'cou_subjects', 'action' => 'edit', $couSubject->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1 ml-2']) ?>
                <?= $this->Html->link(null, ['controller' => 'cou_subjects', 'action' => 'delete', $couSubject->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                <?= '['. h($couSubject->abbreviation) .'] '. h($couSubject->name) .': '. h($couSubject->ppl_user->name) .' '. h($couSubject->ppl_user->lastname)?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
