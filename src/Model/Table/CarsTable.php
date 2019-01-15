<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cars Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TravelsTable|\Cake\ORM\Association\HasMany $Travels
 *
 * @method \App\Model\Entity\Car get($primaryKey, $options = [])
 * @method \App\Model\Entity\Car newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Car[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Car|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Car|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Car patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Car[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Car findOrCreate($search, callable $callback = null, $options = [])
 */
class CarsTable extends Table
{
	
	public function isOwnedBy($car_id, $userid) {
		return $this->exists(['id' => $car_id, 'user_id' => $userid]);
	}

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('cars');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Travels', [
            'foreignKey' => 'car_id'
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
            ->scalar('regist_num')
            ->maxLength('regist_num', 7)
            ->requirePresence('regist_num', 'create')
            ->allowEmptyString('regist_num', false)
            ->add('regist_num', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('cartype')
            ->maxLength('cartype', 50)
            ->requirePresence('cartype', 'create')
            ->allowEmptyString('cartype', false);

        $validator
            ->scalar('color')
            ->maxLength('color', 30)
            ->requirePresence('color', 'create')
            ->allowEmptyString('color', false);

        $validator
            ->allowEmptyString('pass_num');

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
        $rules->add($rules->isUnique(['regist_num']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
