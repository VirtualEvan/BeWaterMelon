<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActEditorialBoard Entity
 *
 * @property int $id
 * @property string $journal_name
 * @property string $link
 * @property string $online_issn
 * @property string $online_issn_year
 * @property string $h_index
 * @property float $sjr
 * @property string $sjr_year
 * @property string $sjr_quartile
 * @property string $print_issn
 * @property float $impact_factor
 * @property string $impact_factor_quartile
 * @property string $impact_factor_year
 */
class ActEditorialBoard extends Entity
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
        'journal_name' => true,
        'link' => true,
        'online_issn' => true,
        'online_issn_year' => true,
        'h_index' => true,
        'sjr' => true,
        'sjr_year' => true,
        'sjr_quartile' => true,
        'print_issn' => true,
        'impact_factor' => true,
        'impact_factor_quartile' => true,
        'impact_factor_year' => true
    ];
}
