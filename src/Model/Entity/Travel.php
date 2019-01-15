<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Travel Entity
 *
 * @property int $id
 * @property int $car_id
 * @property string|null $honnan
 * @property string|null $hova
 *
 * @property \App\Model\Entity\Car $car
 * @property \App\Model\Entity\Passenger[] $passengers
 */
class Travel extends Entity
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
        'car_id' => true,
        'honnan' => true,
        'hova' => true,
        'car' => true,
        'passengers' => true
    ];
}
