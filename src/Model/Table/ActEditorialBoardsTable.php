<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActEditorialBoards Model
 *
 * @method \App\Model\Entity\ActEditorialBoard get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActEditorialBoard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActEditorialBoard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActEditorialBoard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActEditorialBoard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActEditorialBoard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActEditorialBoard findOrCreate($search, callable $callback = null, $options = [])
 */
class ActEditorialBoardsTable extends Table
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

        $this->setTable('act_editorial_boards');
        $this->setDisplayField('id');
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
            ->scalar('journal_name')
            ->requirePresence('journal_name', 'create')
            ->notEmpty('journal_name');

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
            ->scalar('h_index')
            ->requirePresence('h_index', 'create')
            ->notEmpty('h_index');

        $validator
            ->numeric('sjr')
            ->requirePresence('sjr', 'create')
            ->notEmpty('sjr');

        $validator
            ->scalar('sjr_year')
            ->requirePresence('sjr_year', 'create')
            ->notEmpty('sjr_year');

        $validator
            ->scalar('sjr_quartile')
            ->requirePresence('sjr_quartile', 'create')
            ->notEmpty('sjr_quartile');

        $validator
            ->scalar('print_issn')
            ->allowEmpty('print_issn');

        $validator
            ->numeric('impact_factor')
            ->allowEmpty('impact_factor');

        $validator
            ->scalar('impact_factor_quartile')
            ->allowEmpty('impact_factor_quartile');

        $validator
            ->scalar('impact_factor_year')
            ->allowEmpty('impact_factor_year');

        return $validator;
    }
}
