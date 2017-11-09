<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProProduct Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $link
 * @property string $detailed_description
 */
class ProProduct extends Entity
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
        'description' => true,
        'link' => true,
        'detailed_description' => true
    ];
}
