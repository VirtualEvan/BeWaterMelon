<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActJournals Model
 *
 * @method \App\Model\Entity\ActJournal get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActJournal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActJournal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActJournal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActJournal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActJournal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActJournal findOrCreate($search, callable $callback = null, $options = [])
 */
class ActJournalsTable extends Table
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

        $this->setTable('act_journals');
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
            ->requirePresence('link', 'create')
            ->notEmpty('link');

        $validator
            ->scalar('online_issn')
            ->requirePresence('online_issn', 'create')
            ->notEmpty('online_issn');

        $validator
            ->scalar('online_issn_year')
            ->requirePresence('online_issn_year', 'create')
            ->notEmpty('online_issn_year');

        $validator
            ->numeric('impact_factor')
            ->requirePresence('impact_factor', 'create')
            ->notEmpty('impact_factor');

        $validator
            ->scalar('impact_factor_quartile')
            ->requirePresence('impact_factor_quartile', 'create')
            ->notEmpty('impact_factor_quartile');

        $validator
            ->scalar('impact_factor_year')
            ->requirePresence('impact_factor_year', 'create')
            ->notEmpty('impact_factor_year');

        $validator
            ->scalar('print_issn')
            ->allowEmpty('print_issn');

        return $validator;
    }
}
