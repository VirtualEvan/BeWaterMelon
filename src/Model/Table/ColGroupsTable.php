<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ColGroups Model
 *
 * @method \App\Model\Entity\ColGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\ColGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ColGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ColGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ColGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ColGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ColGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class ColGroupsTable extends Table
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

        $this->setTable('col_groups');
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
            ->scalar('department')
            ->requirePresence('department', 'create')
            ->notEmpty('department');

        $validator
            ->scalar('company')
            ->requirePresence('company', 'create')
            ->notEmpty('company');

        $validator
            ->scalar('link')
            ->requirePresence('link', 'create')
            ->notEmpty('link');

        return $validator;
    }
}
