<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ResContract Entity
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $scheduling
 * @property string $sponsor_link
 *
 * @property \App\Model\Entity\ResContractParticipant[] $res_contract_participants
 */
class ResContract extends Entity
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
        'code' => true,
        'scheduling' => true,
        'sponsor_link' => true,
        'res_contract_participants' => true
    ];
}
