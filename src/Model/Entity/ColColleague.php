<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ColColleague Entity
 *
 * @property int $id
 * @property string $name
 * @property bool $doctor
 * @property string $department
 * @property string $position
 * @property string $company
 * @property string $email
 * @property string $link
 */
class ColColleague extends Entity
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
        'doctor' => true,
        'department' => true,
        'position' => true,
        'company' => true,
        'email' => true,
        'link' => true
    ];
}
