<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PplPhds Model
 *
 * @method \App\Model\Entity\PplPhd get($primaryKey, $options = [])
 * @method \App\Model\Entity\PplPhd newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PplPhd[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PplPhd|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PplPhd patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PplPhd[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PplPhd findOrCreate($search, callable $callback = null, $options = [])
 */
class PplPhdsTable extends Table
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

        $this->setTable('ppl_phds');
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
            ->scalar('thesis_name')
            ->requirePresence('thesis_name', 'create')
            ->notEmpty('thesis_name');

        return $validator;
    }
}
