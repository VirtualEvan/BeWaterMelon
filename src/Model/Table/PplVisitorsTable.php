<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PplVisitors Model
 *
 * @method \App\Model\Entity\PplVisitor get($primaryKey, $options = [])
 * @method \App\Model\Entity\PplVisitor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PplVisitor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PplVisitor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PplVisitor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PplVisitor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PplVisitor findOrCreate($search, callable $callback = null, $options = [])
 */
class PplVisitorsTable extends Table
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

        $this->setTable('ppl_visitors');
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
            ->scalar('lastname')
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->scalar('link')
            ->requirePresence('link', 'create')
            ->notEmpty('link')
            ->add('link', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('doctor')
            ->requirePresence('doctor', 'create')
            ->notEmpty('doctor');

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
        $rules->add($rules->isUnique(['link']));

        return $rules;
    }
}
