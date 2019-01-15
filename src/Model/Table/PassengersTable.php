<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Passengers Model
 *
 * @property \App\Model\Table\TravelsTable|\Cake\ORM\Association\BelongsTo $Travels
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Passenger get($primaryKey, $options = [])
 * @method \App\Model\Entity\Passenger newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Passenger[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Passenger|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Passenger|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Passenger patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Passenger[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Passenger findOrCreate($search, callable $callback = null, $options = [])
 */
class PassengersTable extends Table
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

        $this->setTable('passengers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Travels', [
            'foreignKey' => 'travel_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['travel_id'], 'Travels'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
