<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PubBooks Model
 *
 * @method \App\Model\Entity\PubBook get($primaryKey, $options = [])
 * @method \App\Model\Entity\PubBook newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PubBook[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PubBook|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PubBook patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PubBook[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PubBook findOrCreate($search, callable $callback = null, $options = [])
 */
class PubBooksTable extends Table
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

        $this->setTable('pub_books');
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
            ->scalar('book_name')
            ->requirePresence('book_name', 'create')
            ->notEmpty('book_name');

        $validator
            ->scalar('author')
            ->requirePresence('author', 'create')
            ->notEmpty('author');

        $validator
            ->scalar('editorial')
            ->requirePresence('editorial', 'create')
            ->notEmpty('editorial');

        $validator
            ->scalar('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

        $validator
            ->scalar('country')
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->scalar('isbn')
            ->requirePresence('isbn', 'create')
            ->notEmpty('isbn')
            ->add('isbn', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('link')
            ->allowEmpty('link');

        $validator
            ->scalar('physical_identifier')
            ->allowEmpty('physical_identifier');

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
        $rules->add($rules->isUnique(['isbn']));

        return $rules;
    }
}
