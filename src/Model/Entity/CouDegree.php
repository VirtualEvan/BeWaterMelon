<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CouDegree Entity
 *
 * @property int $id
 * @property string $name
 * @property string $link
 *
 * @property \App\Model\Entity\CouCourseDegreeSubject[] $cou_course_degree_subjects
 */
class CouDegree extends Entity
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
        'link' => true,
        'cou_course_degree_subjects' => true
    ];
}
