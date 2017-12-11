<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Jobapp Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $telephone
 * @property string $address
 * @property int $department_id
 * @property \Cake\I18n\FrozenTime $submissiondate
 *
 * @property \App\Model\Entity\Department $department
 */
class Jobapp extends Entity
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
        'email' => true,
        'telephone' => true,
        'address' => true,
        'department_id' => true,
        'submissiondate' => true,
        'department' => true
    ];
}
