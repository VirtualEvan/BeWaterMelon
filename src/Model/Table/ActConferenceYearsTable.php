<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActConferenceYears Model
 *
 * @property \App\Model\Table\ActConferencesTable|\Cake\ORM\Association\BelongsTo $ActConferences
 *
 * @method \App\Model\Entity\ActConferenceYear get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActConferenceYear newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActConferenceYear[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActConferenceYear|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActConferenceYear patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActConferenceYear[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActConferenceYear findOrCreate($search, callable $callback = null, $options = [])
 */
class ActConferenceYearsTable extends Table
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

        $this->setTable('act_conference_years');
        $this->setDisplayField('act_conference_id');
        $this->setPrimaryKey(['act_conference_id', 'year']);

        $this->belongsTo('ActConferences', [
            'foreignKey' => 'act_conference_id',
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
            ->scalar('year')
            ->allowEmpty('year', 'create');

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
        $rules->add($rules->existsIn(['act_conference_id'], 'ActConferences'));

        return $rules;
    }
}
