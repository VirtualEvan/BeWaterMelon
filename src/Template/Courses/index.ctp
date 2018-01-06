<?php $currentuser = $this->request->session()->read('Auth.User'); ?>

<div class="container part">
    <?php
    if($currentuser['rol'] == 'admin'){
        echo $this->Html->link(__('Add Course'), ['controller' => 'cou_course_degree_subjects', 'action' => 'add'], ['class' => 'btn btn-info btn-sm mr-1']);
        echo $this->Html->link(__('Add Subject'), ['controller' => 'cou_subjects', 'action' => 'add'], ['class' => 'btn btn-info btn-sm']);
    }
    ?>
    <div class="row">
        <?php foreach ($couDegrees as $couDegree): ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-11 my-auto p-0">
                        <table>
                            <tr>
                                <th>
                                    <h4><?= h($couDegree->name) ?></h4>
                                    <?= $this->Html->link(null, ['controller' => 'cou_course_degree_subjects', 'action' => 'edit', $couDegree->cou_degree_id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                    <?= $this->Form->postLink(null, ['controller' => 'cou_course_degree_subjects', 'action' => 'delete', $couDegree->cou_degree_id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                                    <hr/>
                                </th>
                            </tr>
                            <?php foreach ($couCourseDegreeSubjects as $couCourseDegreeSubject): ?>
                                <?php if($couDegree->id == $couCourseDegreeSubject->cou_degree_id): ?>
                                    <tr>
                                        <td>
                                            <?= '['. h($couCourseDegreeSubject->cou_subject->abbreviation) .'] '. h($couCourseDegreeSubject->cou_subject->name) .': '. h($couCourseDegreeSubject->cou_subject->ppl_user->name) .' '. h($couCourseDegreeSubject->cou_subject->ppl_user->lastname)?>
                                            <?= $this->Html->link(null, ['controller' => 'cou_subjects', 'action' => 'edit', $couCourseDegreeSubject->cou_subject_id], ['class' => 'btn btn-info btn-sm fa fa-pencil mb-1']) ?>
                                            <?= $this->Form->postLink(null, ['controller' => 'cou_subjects', 'action' => 'delete', $couCourseDegreeSubject->cou_subject_id], ['class' => 'btn btn-info btn-sm fa fa-trash mb-1']) ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
