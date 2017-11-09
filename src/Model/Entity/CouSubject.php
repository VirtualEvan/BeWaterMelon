<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CouSubject Entity
 *
 * @property int $id
 * @property string $name
 * @property int $ppl_user_id
 * @property string $abbreviation
 *
 * @property \App\Model\Entity\PplUser $ppl_user
 * @property \App\Model\Entity\CouCourseDegreeSubject[] $cou_course_degree_subjects
 */
class CouSubject extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'ppl_user_id' => true,
        'abbreviation' => true,
        'ppl_user' => true,
        'cou_course_degree_subjects' => true
    ];
}
