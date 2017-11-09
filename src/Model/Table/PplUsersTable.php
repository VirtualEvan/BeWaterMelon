<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PplUsers Model
 *
 * @property \App\Model\Table\CouSubjectsTable|\Cake\ORM\Association\HasMany $CouSubjects
 *
 * @method \App\Model\Entity\PplUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\PplUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PplUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PplUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PplUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PplUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PplUser findOrCreate($search, callable $callback = null, $options = [])
 */
class PplUsersTable extends Table
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

        $this->setTable('ppl_users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('CouSubjects', [
            'foreignKey' => 'ppl_user_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('lastname')
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->scalar('rol')
            ->requirePresence('rol', 'create')
            ->notEmpty('rol');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('phone')
            ->requirePresence('phone', 'create')
            ->notEmpty('phone')
            ->add('phone', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('bio')
            ->requirePresence('bio', 'create')
            ->notEmpty('bio');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('fax')
            ->allowEmpty('fax');

        $validator
            ->scalar('link')
            ->allowEmpty('link')
            ->add('link', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['phone']));
        $rules->add($rules->isUnique(['link']));

        return $rules;
    }
}
