<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResContracts Model
 *
 * @property \App\Model\Table\ResContractParticipantsTable|\Cake\ORM\Association\HasMany $ResContractParticipants
 *
 * @method \App\Model\Entity\ResContract get($primaryKey, $options = [])
 * @method \App\Model\Entity\ResContract newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ResContract[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResContract|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ResContract patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ResContract[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResContract findOrCreate($search, callable $callback = null, $options = [])
 */
class ResContractsTable extends Table
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

        $this->setTable('res_contracts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ResContractParticipants', [
            'foreignKey' => 'res_contract_id'
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
            ->allowEmpty('sponsor_link');

        return $validator;
    }
}
