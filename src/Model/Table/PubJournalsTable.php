<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PubJournals Model
 *
 * @method \App\Model\Entity\PubJournal get($primaryKey, $options = [])
 * @method \App\Model\Entity\PubJournal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PubJournal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PubJournal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PubJournal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PubJournal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PubJournal findOrCreate($search, callable $callback = null, $options = [])
 */
class PubJournalsTable extends Table
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

        $this->setTable('pub_journals');
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
            ->scalar('author')
            ->requirePresence('author', 'create')
            ->notEmpty('author');

        $validator
            ->scalar('publication_name')
            ->requirePresence('publication_name', 'create')
            ->notEmpty('publication_name');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('location')
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        $validator
            ->scalar('publication_date')
            ->requirePresence('publication_date', 'create')
            ->notEmpty('publication_date');

        $validator
            ->scalar('online_issn')
            ->requirePresence('online_issn', 'create')
            ->notEmpty('online_issn');

        $validator
            ->scalar('link')
            ->allowEmpty('link');

        $validator
            ->scalar('print_issn')
            ->allowEmpty('print_issn');

        return $validator;
    }
}
