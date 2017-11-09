<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PubJournal Entity
 *
 * @property int $id
 * @property string $author
 * @property string $publication_name
 * @property string $name
 * @property string $location
 * @property string $publication_date
 * @property string $online_issn
 * @property string $link
 * @property string $print_issn
 */
class PubJournal extends Entity
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
        'publication_name' => true,
        'name' => true,
        'location' => true,
        'publication_date' => true,
        'online_issn' => true,
        'link' => true,
        'print_issn' => true
    ];
}
