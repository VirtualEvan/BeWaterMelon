<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrePress[]|\Cake\Collection\CollectionInterface $prePresses
 */

 $currentuser = $this->request->session()->read('Auth.User');
?>

<div class='container part'>
    <h4> <?= __('Press') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(null, ['controller' => 'pre_presses', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div id="Pagination" class="pagination"></div>
    <div id="Searchresult"></div>
</div>

<div id="hiddenresult" class="container" style="display: none;">
    <?php foreach ($prePresses as $prePress): ?>
        <div class="container result pag<?= 2018-date('Y',strtotime($prePress->date)) ?>">
            <div class="row">
                <?php if($currentuser['rol'] == 'admin'): ?>
                    <div class="col-md-1">
                            <?= $this->Html->link(null, ['controller' => 'pre_presses', 'action' => 'edit', $prePress->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                            <?= $this->Html->link(null, ['controller' => 'pre_presses', 'action' => 'delete', $prePress->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                    </div>
                <?php endif; ?>
                <div class="col-md-11 my-auto p-0">
                    <div class="row">
                        <?= $prePress->date->i18nFormat([\IntlDateFormatter::FULL, \IntlDateFormatter::NONE], 'Europe/Madrid', 'en-UK').',' ?>
                        <?= h($prePress->source) ?>
                    </div>
                    <div class="row">
                        <h5>
                            <?php
                                if (substr($prePress->link, 0, 4) != "http"){
                                    $prePress->link = "http://".$prePress->link;
                                }
                            ?>
                            <?= $this->Html->link($prePress->name, $prePress->link) ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->Html->script('paginate.js') ?>

<?= $this->Html->script('active-paginate.js') ?>
