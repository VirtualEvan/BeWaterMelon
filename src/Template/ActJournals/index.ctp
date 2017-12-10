<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActJournal[]|\Cake\Collection\CollectionInterface $actJournals
 */
 $currentuser = $this->request->session()->read('Auth.User');
 ?>
 <div class='container part'>
     <h4> <?= __('Journals') ?> </h4>
     <?php
     if($currentuser['rol'] == 'admin'){
         echo $this->Html->link(null, ['controller' => 'act_journals', 'action' => 'add'], ['class' => 'btn btn-info btn-sm fa fa-plus']);
     }
     ?>
     <hr/>
     <div class="row">
         <?php foreach ($actJournals as $actJournal): ?>
             <div class="container">
                 <div class="row">
                     <?php if($currentuser['rol'] == 'admin'): ?>
                         <div class="col-md-1">
                                 <?= $this->Html->link(null, ['controller' => 'act_journals', 'action' => 'edit', $actJournal->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                 <?= $this->Form->postLink(null, ['controller' => 'act_journals', 'action' => 'delete', $actJournal->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                         </div>
                     <?php endif; ?>
                     <div class="col-md-11 my-auto p-0">
                         <?php
                             if (substr($actJournal->link, 0, 4) != "http"){
                               $actJournal->link = "http://".$actJournal->link;
                             }
                             echo $this->Html->link($actJournal->name, $actJournal->link);
                             echo ', ISSN: ';
                             if(!empty($actJournal->print_issn)){
                                 echo $actJournal->print_issn . ' (Print), ';
                             }
                             echo $actJournal->online_issn . ' (Online) ';
                             echo '(' . __('since') . ' ' . $actJournal->online_issn_year .')';
                             echo '<br>';
                             echo 'Impact Factor (' . $actJournal->impact_factor_year . '): ';
                             echo $actJournal->impact_factor;
                             echo ' [Q' . $actJournal->impact_factor_quartile . ']';

                         ?>
                     </div>
                 </div>
             </div>
         <?php endforeach; ?>
     </div>
 </div>
