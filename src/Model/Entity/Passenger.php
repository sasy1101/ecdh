<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Passenger Entity
 *
 * @property int $id
 * @property int $travel_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Travel $travel
 * @property \App\Model\Entity\User $user
 */
class Passenger extends Entity
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
        'travel_id' => true,
        'user_id' => true,
        'travel' => true,
        'user' => true
    ];
}
