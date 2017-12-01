<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ResContractParticipant Entity
 *
 * @property int $res_contract_id
 * @property string $participant
 * @property string $link
 *
 * @property \App\Model\Entity\ResContract $res_contract
 */
class ResContractParticipant extends Entity
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
        'link' => true,
        'participant' => true,
        'res_contract' => true
    ];
}
