<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PubConferences Model
 *
 * @method \App\Model\Entity\PubConference get($primaryKey, $options = [])
 * @method \App\Model\Entity\PubConference newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PubConference[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PubConference|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PubConference patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PubConference[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PubConference findOrCreate($search, callable $callback = null, $options = [])
 */
class PubConferencesTable extends Table
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

        $this->setTable('pub_conferences');
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('city')
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->scalar('country')
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->scalar('link')
            ->allowEmpty('link')
            ->add('link', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['link']));

        return $rules;
    }
}
