<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResContractParticipants Model
 *
 * @property \App\Model\Table\ResContractsTable|\Cake\ORM\Association\BelongsTo $ResContracts
 *
 * @method \App\Model\Entity\ResContractParticipant get($primaryKey, $options = [])
 * @method \App\Model\Entity\ResContractParticipant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ResContractParticipant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResContractParticipant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ResContractParticipant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ResContractParticipant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResContractParticipant findOrCreate($search, callable $callback = null, $options = [])
 */
class ResContractParticipantsTable extends Table
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

        $this->setTable('res_contract_participants');
        $this->setDisplayField('res_contract_id');
        $this->setPrimaryKey(['res_contract_id', 'participant']);

        $this->belongsTo('ResContracts', [
            'foreignKey' => 'res_contract_id',
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
        $rules->add($rules->existsIn(['res_contract_id'], 'ResContracts'));

        return $rules;
    }
}
