<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActJournal Entity
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $online_issn
 * @property string $online_issn_year
 * @property float $impact_factor
 * @property string $impact_factor_quartile
 * @property string $impact_factor_year
 * @property string $print_issn
 */
class ActJournal extends Entity
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
        'online_issn' => true,
        'online_issn_year' => true,
        'impact_factor' => true,
        'impact_factor_quartile' => true,
        'impact_factor_year' => true,
        'print_issn' => true
    ];
}
