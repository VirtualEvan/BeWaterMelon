<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CouCourseDegreeSubject Entity
 *
 * @property int $cou_degree_id
 * @property int $cou_subject_id
 * @property string $year
 *
 * @property \App\Model\Entity\CouDegree $cou_degree
 * @property \App\Model\Entity\CouSubject $cou_subject
 */
class CouCourseDegreeSubject extends Entity
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
        'cou_degree' => true,
        'cou_subject' => true,
        'year' => true
    ];
}
