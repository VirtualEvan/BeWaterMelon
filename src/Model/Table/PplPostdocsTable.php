<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PplPostdocs Model
 *
 * @method \App\Model\Entity\PplPostdoc get($primaryKey, $options = [])
 * @method \App\Model\Entity\PplPostdoc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PplPostdoc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PplPostdoc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PplPostdoc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PplPostdoc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PplPostdoc findOrCreate($search, callable $callback = null, $options = [])
 */
class PplPostdocsTable extends Table
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

        $this->setTable('ppl_postdocs');
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

        return $validator;
    }
}
