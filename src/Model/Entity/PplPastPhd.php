<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PplPastPhd Entity
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $thesis_date
 * @property string $thesis_name
 * @property string $thesis_link
 */
class PplPastPhd extends Entity
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
        'lastname' => true,
        'thesis_date' => true,
        'thesis_name' => true,
        'thesis_link' => true
    ];
}
