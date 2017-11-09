<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CouSubjects Model
 *
 * @property \App\Model\Table\PplUsersTable|\Cake\ORM\Association\BelongsTo $PplUsers
 * @property \App\Model\Table\CouCourseDegreeSubjectsTable|\Cake\ORM\Association\HasMany $CouCourseDegreeSubjects
 *
 * @method \App\Model\Entity\CouSubject get($primaryKey, $options = [])
 * @method \App\Model\Entity\CouSubject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CouSubject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CouSubject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CouSubject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CouSubject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CouSubject findOrCreate($search, callable $callback = null, $options = [])
 */
class CouSubjectsTable extends Table
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

        $this->setTable('cou_subjects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('PplUsers', [
            'foreignKey' => 'ppl_user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CouCourseDegreeSubjects', [
            'foreignKey' => 'cou_subject_id'
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
            ->scalar('abbreviation')
            ->requirePresence('abbreviation', 'create')
            ->notEmpty('abbreviation');

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
        $rules->add($rules->existsIn(['ppl_user_id'], 'PplUsers'));

        return $rules;
    }
}
