<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ColMembers Model
 *
 * @method \App\Model\Entity\ColMember get($primaryKey, $options = [])
 * @method \App\Model\Entity\ColMember newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ColMember[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ColMember|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ColMember patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ColMember[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ColMember findOrCreate($search, callable $callback = null, $options = [])
 */
class ColMembersTable extends Table
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

        $this->setTable('col_members');
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
            ->scalar('link')
            ->allowEmpty('link');

        return $validator;
    }
}
