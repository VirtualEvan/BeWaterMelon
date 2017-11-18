<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PplCollaborators Model
 *
 * @method \App\Model\Entity\PplCollaborator get($primaryKey, $options = [])
 * @method \App\Model\Entity\PplCollaborator newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PplCollaborator[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PplCollaborator|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PplCollaborator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PplCollaborator[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PplCollaborator findOrCreate($search, callable $callback = null, $options = [])
 */
class PplCollaboratorsTable extends Table
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

        $this->setTable('ppl_collaborators');
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
            ->boolean('doctor')
            ->requirePresence('doctor', 'create')
            ->notEmpty('doctor');

        return $validator;
    }
}
