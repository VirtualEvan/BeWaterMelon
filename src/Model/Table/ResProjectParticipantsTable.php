<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResProjectParticipants Model
 *
 * @property \App\Model\Table\ResProjectsTable|\Cake\ORM\Association\BelongsTo $ResProjects
 *
 * @method \App\Model\Entity\ResProjectParticipant get($primaryKey, $options = [])
 * @method \App\Model\Entity\ResProjectParticipant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ResProjectParticipant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResProjectParticipant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ResProjectParticipant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ResProjectParticipant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResProjectParticipant findOrCreate($search, callable $callback = null, $options = [])
 */
class ResProjectParticipantsTable extends Table
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

        $this->setTable('res_project_participants');
        $this->setDisplayField('res_project_id');
        $this->setPrimaryKey(['res_project_id', 'participant']);

        $this->belongsTo('ResProjects', [
            'foreignKey' => 'res_project_id',
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
            ->scalar('participant')
            ->allowEmpty('participant', 'create');

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
        $rules->add($rules->existsIn(['res_project_id'], 'ResProjects'));

        return $rules;
    }
}
