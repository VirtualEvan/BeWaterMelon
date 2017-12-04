<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ColColleagues Model
 *
 * @method \App\Model\Entity\ColColleague get($primaryKey, $options = [])
 * @method \App\Model\Entity\ColColleague newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ColColleague[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ColColleague|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ColColleague patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ColColleague[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ColColleague findOrCreate($search, callable $callback = null, $options = [])
 */
class ColColleaguesTable extends Table
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

        $this->setTable('col_colleagues');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->boolean('doctor')
            ->requirePresence('doctor', 'create')
            ->notEmpty('doctor');

        $validator
            ->scalar('department')
            ->requirePresence('department', 'create')
            ->notEmpty('department');

        $validator
            ->scalar('position')
            ->requirePresence('position', 'create')
            ->notEmpty('position');

        $validator
            ->scalar('company')
            ->requirePresence('company', 'create')
            ->notEmpty('company');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('link')
            ->allowEmpty('link');

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

        return $rules;
    }
}
