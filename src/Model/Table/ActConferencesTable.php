<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActConferences Model
 *
 * @property \App\Model\Table\ActConferenceYearsTable|\Cake\ORM\Association\HasMany $ActConferenceYears
 *
 * @method \App\Model\Entity\ActConference get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActConference newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActConference[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActConference|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActConference patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActConference[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActConference findOrCreate($search, callable $callback = null, $options = [])
 */
class ActConferencesTable extends Table
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

        $this->setTable('act_conferences');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ActConferenceYears', [
            'foreignKey' => 'act_conference_id',
            'saveStrategy' => 'replace'
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
            ->scalar('acronym')
            ->requirePresence('acronym', 'create')
            ->notEmpty('acronym');

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
