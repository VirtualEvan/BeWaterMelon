<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActEditorialBoard[]|\Cake\Collection\CollectionInterface $actEditorialBoards
 */
$currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container part'>
    <h4> <?= __('Editorial Boards') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin' || $currentuser['rol'] == 'reg'){
        echo $this->Html->link(null, ['controller' => 'act_editorial_boards', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($actEditorialBoards as $actEditorialBoard): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin' || $currentuser['rol'] == 'reg'): ?>
                        <div class="col-md-1">
                                <?= $this->Html->link(null, ['controller' => 'act_editorial_boards', 'action' => 'edit', $actEditorialBoard->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'act_editorial_boards', 'action' => 'delete', $actEditorialBoard->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-11 my-auto p-0">
                        <?php
                            if (substr($actEditorialBoard->link, 0, 4) != "http"){
                              $actEditorialBoard->link = "http://".$actEditorialBoard->link;
                            }
                            echo $this->Html->link($actEditorialBoard->journal_name, $actEditorialBoard->link);
                            echo ', ISSN: ';
                            if(!empty($actEditorialBoard->print_issn)){
                                echo $actEditorialBoard->print_issn . ' (Print), ';
                            }
                            echo $actEditorialBoard->online_issn . ' (Online) ';
                            echo '(' . __('since') . ' ' . $actEditorialBoard->online_issn_year .')';
                            echo '<br>';
                            if(!empty($actEditorialBoard->impact_factor)){
                                echo 'Impact Factor (' . $actEditorialBoard->impact_factor_year . '): ';
                                echo $actEditorialBoard->impact_factor;
                                echo ' [Q' . $actEditorialBoard->impact_factor_quartile . ']';
                                echo '<br>';
                            }
                            echo 'SCImago Journal Rank (SJR ' . $actEditorialBoard->sjr_year . '): ' . $actEditorialBoard->sjr. '; ';
                            echo 'H-index: ' . $actEditorialBoard->h_index . '; ';
                            echo __('SJR Best Quartile: Q') . $actEditorialBoard->sjr_quartile;

                        ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
