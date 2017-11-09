<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PubBook Entity
 *
 * @property int $id
 * @property string $book_name
 * @property string $author
 * @property string $editorial
 * @property string $year
 * @property string $country
 * @property string $isbn
 * @property string $link
 * @property string $physical_id
 *
 * @property \App\Model\Entity\Physical $physical
 */
class PubBook extends Entity
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
        'book_name' => true,
        'author' => true,
        'editorial' => true,
        'year' => true,
        'country' => true,
        'isbn' => true,
        'link' => true,
        'physical_id' => true,
        'physical' => true
    ];
}
