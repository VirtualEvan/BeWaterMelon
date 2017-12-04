<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActConferenceYear Entity
 *
 * @property int $act_conference_id
 * @property string $year
 * @property string $link
 *
 * @property \App\Model\Entity\ActConference $act_conference
 */
class ActConferenceYear extends Entity
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
        'year' => true,
        'link' => true,
        'act_conference' => true
    ];
}
