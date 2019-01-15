<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Travels Model
 *
 * @property \App\Model\Table\CarsTable|\Cake\ORM\Association\BelongsTo $Cars
 * @property \App\Model\Table\PassengersTable|\Cake\ORM\Association\HasMany $Passengers
 *
 * @method \App\Model\Entity\Travel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Travel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Travel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Travel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Travel|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Travel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Travel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Travel findOrCreate($search, callable $callback = null, $options = [])
 */
class TravelsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('travels');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cars', [
            'foreignKey' => 'car_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Passengers', [
            'foreignKey' => 'travel_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('honnan')
            ->maxLength('honnan', 75)
            ->allowEmptyString('honnan');

        $validator
            ->scalar('hova')
            ->maxLength('hova', 75)
            ->allowEmptyString('hova');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['car_id'], 'Cars'));

        return $rules;
    }
}
