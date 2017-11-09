<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActConference Entity
 *
 * @property int $id
 * @property string $acronym
 * @property string $name
 * @property string $link
 *
 * @property \App\Model\Entity\ActConferenceYear[] $act_conference_years
 */
class ActConference extends Entity
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
        'acronym' => true,
        'name' => true,
        'link' => true,
        'act_conference_years' => true
    ];
}
