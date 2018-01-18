<?php $currentuser = $this->request->session()->read('Auth.User'); ?>

<div>
    <div class="mb-3">
        <?php
        if($currentuser['rol'] == 'admin' || $currentuser['rol'] == 'reg'){
            echo $this->Html->link(__('Add Course'), ['controller' => 'cou_course_degree_subjects', 'action' => 'add'], ['class' => 'btn btn-info btn-sm mr-1']);
            echo $this->Html->link(__('Add Subject'), ['controller' => 'cou_subjects', 'action' => 'add'], ['class' => 'btn btn-info btn-sm mr-1']);
            echo $this->Html->link(__('Manage Subjects'), ['controller' => 'cou_subjects', 'action' => 'index'], ['class' => 'btn btn-info btn-sm']);
        }
        ?>
    </div>
    <div id="PaginationCourses" class="pagination"></div>
</div>

<div class="container part">
    <div class="row">
        <?php foreach ($couDegrees as $couDegree): ?>
            <div class="container">
                        <?php $first = true; ?>
                        <?php foreach ($couCourseDegreeSubjects as $couCourseDegreeSubject): ?>
                            <?php if($couDegree->id == $couCourseDegreeSubject->cou_degree_id): ?>
                                <div id="SearchresultCourses"></div>
                                <div id="hiddenresultCourses" class="container part" style="display: none;">
                                    <div class="result pag<?= 2018-$couCourseDegreeSubject->year ?>">
                                        <?php if($first): ?>
                                            <div class="mt-4">
                                                <?php
                                                if (substr($couDegree->link, 0, 4) != "http"){
                                                    $couDegree->link = "http://".$couDegree->link;
                                                }
                                                ?>
                                                <a name = "<?= $couDegree->id ?>"></a>
                                                <h4><?= $this->Html->link($couDegree->name, $couDegree->link) ?></h4>
                                                <?php if($currentuser['rol'] == 'admin' || $currentuser['rol'] == 'reg'): ?>
                                                    <?= $this->Html->link(null, ['controller' => 'cou_course_degree_subjects', 'action' => 'edit', $couDegree->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                                    <?= $this->Html->link(null, ['controller' => 'cou_degrees', 'action' => 'delete', $couDegree->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                                                <?php endif; ?>
                                                <hr/>
                                            </div>
                                        <?php $first = false; endif; ?>
                                        <div class="row">
                                            <div class="col-md-11 my-auto p-0">
                                                <?php if($currentuser['rol'] == 'admin' || $currentuser['rol'] == 'reg'): ?>
                                                    <?= $this->Html->link(null, ['controller' => 'cou_subjects', 'action' => 'edit', $couCourseDegreeSubject->cou_subject_id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1 ml-2']) ?>
                                                    <?= $this->Html->link(null, ['controller' => 'cou_subjects', 'action' => 'delete', $couCourseDegreeSubject->cou_subject_id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                                                <?php endif; ?>
                                                <?= '['. h($couCourseDegreeSubject->cou_subject->abbreviation) .'] '. h($couCourseDegreeSubject->cou_subject->name) .': '. h($couCourseDegreeSubject->cou_subject->ppl_user->name) .' '. h($couCourseDegreeSubject->cou_subject->ppl_user->lastname)?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php if($first): ?>
                                <div class="mt-4">
                                    <?php
                                    if (substr($couDegree->link, 0, 4) != "http"){
                                        $couDegree->link = "http://".$couDegree->link;
                                    }
                                    ?>
                                    <a name = "<?= $couDegree->id ?>"></a>
                                    <h4><?= $this->Html->link($couDegree->name, $couDegree->link) ?></h4>
                                    <?php if($currentuser['rol'] == 'admin' || $currentuser['rol'] == 'reg'): ?>
                                        <?= $this->Html->link(null, ['controller' => 'cou_course_degree_subjects', 'action' => 'edit', $couDegree->id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                        <?= $this->Html->link(null, ['controller' => 'cou_degrees', 'action' => 'delete', $couDegree->id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                                    <?php endif; ?>
                                    <hr/>
                                </div>
                        <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->Html->script('paginate.js') ?>

<?= $this->Html->script('active-paginate-courses.js') ?>
