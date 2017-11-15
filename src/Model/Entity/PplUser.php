<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * PplUser Entity
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $rol
 * @property string $email
 * @property string $phone
 * @property string $bio
 * @property string $password
 * @property string $fax
 * @property string $link
 *
 * @property \App\Model\Entity\CouSubject[] $cou_subjects
 */
class PplUser extends Entity
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
        'lastname' => true,
        'rol' => true,
        'email' => true,
        'phone' => true,
        'bio' => true,
        'password' => true,
        'fax' => true,
        'link' => true,
        'cou_subjects' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
