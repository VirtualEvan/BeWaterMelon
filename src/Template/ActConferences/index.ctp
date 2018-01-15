<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActConference[]|\Cake\Collection\CollectionInterface $actConferences
 */
 $currentuser = $this->request->session()->read('Auth.User');
 ?>
<div class='container part'>
    <h4> <?= __('Conferences') ?> </h4>
    <?php
    if($currentuser['rol'] == 'admin' || $currentuser['rol'] == 'reg'){
        echo $this->Html->link(null, ['controller' => 'act_conferences', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
    }
    ?>
    <hr/>
    <div class="row">
        <?php foreach ($actConferences as $actConference): ?>
            <div class="container">
                <div class="row">
                    <?php if($currentuser['rol'] == 'admin' || $currentuser['rol'] == 'reg'): ?>
                        <div class="col-md-1">
                                <?= $this->Html->link(null, ['controller' => 'act_conferences', 'action' => 'edit', $actConference->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                <?= $this->Form->postLink(null, ['controller' => 'act_conferences', 'action' => 'delete', $actConference->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-11 my-auto p-0">
                        <?php
                            echo strtoupper($actConference->acronym) . ' ' . $actConference->name;
                            echo '<br>';
                            foreach ($actConference->act_conference_years as $key => $conferenceYears){
                                if(!empty($conferenceYears->link)){
                                    if (substr($conferenceYears->link, 0, 4) != "http"){
                                        $conferenceYears->link = "http://".$conferenceYears->link;
                                    }
                                    echo $this->Html->link($conferenceYears->year, $conferenceYears->link);
                                }
                                else {
                                    echo $conferenceYears->year;
                                }
                                if($key != sizeof($actConference->act_conference_years)-1){
                                    echo ', ';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
