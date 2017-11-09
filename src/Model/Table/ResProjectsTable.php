<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResProjects Model
 *
 * @property \App\Model\Table\ResProjectParticipantsTable|\Cake\ORM\Association\HasMany $ResProjectParticipants
 *
 * @method \App\Model\Entity\ResProject get($primaryKey, $options = [])
 * @method \App\Model\Entity\ResProject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ResProject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResProject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ResProject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ResProject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResProject findOrCreate($search, callable $callback = null, $options = [])
 */
class ResProjectsTable extends Table
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

        $this->setTable('res_projects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ResProjectParticipants', [
            'foreignKey' => 'res_project_id'
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
            ->scalar('code')
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->scalar('scheduling')
            ->requirePresence('scheduling', 'create')
            ->notEmpty('scheduling');

        $validator
            ->scalar('sponsor_link')
            ->requirePresence('sponsor_link', 'create')
            ->notEmpty('sponsor_link');

        return $validator;
    }
}
