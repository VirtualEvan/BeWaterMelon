<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PubConference Entity
 *
 * @property int $id
 * @property string $author
 * @property string $name
 * @property \Cake\I18n\FrozenDate $date
 * @property string $city
 * @property string $country
 * @property string $link
 */
class PubConference extends Entity
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
        'author' => true,
        'name' => true,
        'date' => true,
        'city' => true,
        'country' => true,
        'link' => true
    ];
}
