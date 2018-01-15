<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser[]|\Cake\Collection\CollectionInterface $pplUsers
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class='container part'>
    <h4> <?= __('Group History') ?> </h4>
    <hr/>
    <div class="row">
      <div class="col-md-12">
        <?php if (count($resProjects) == 0){ ?>
            <h4> <?= __('There are no projects yet') ?> </h4>
          <?php }else{ ?>
          <table class="table table-striped table-responsive table-bordered">
            <tfoot>
              <tr>
                <th class="bg-primary"><?= __('Start Year') ?></th>
                <?php $years = []; ?>
                <?php foreach ($resProjects as $resProject):
                  $year = substr($resProject['scheduling'], 0, 4);
                  if (!in_array($year, $years)): ?>
                  <th class="bg-primary"><?= substr($resProject['scheduling'], 0, 4);?></th>
                  <?php
                  $years [] = $year;
                  endif; ?>
                <?php endforeach; ?>
              </tr>
            </tfoot>


            <tbody>
              <?php $numYears = 0;?>
              <?php foreach ($years as $yr): ?>
                <?php foreach ($resProjects as $resProject):
                  $year = substr($resProject['scheduling'], 0, 4);
                  if ($year == $yr):?>
                    <tr>
                      <th></th>
                      <?php for ($i = 0; $i < $numYears; $i++): ?>
                        <td></td>
                      <?php endfor; ?>
                      <td><?= $resProject['name'];?></td>
                    </tr>
                  <?php endif;
                endforeach;
                $numYears++;
              endforeach;?>
            </tbody>

          </table>
        <?php } ?>
