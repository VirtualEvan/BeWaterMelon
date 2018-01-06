<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CouCourseDegreeSubjects Model
 *
 * @property \App\Model\Table\CouDegreesTable|\Cake\ORM\Association\BelongsTo $CouDegrees
 * @property \App\Model\Table\CouSubjectsTable|\Cake\ORM\Association\BelongsTo $CouSubjects
 *
 * @method \App\Model\Entity\CouCourseDegreeSubject get($primaryKey, $options = [])
 * @method \App\Model\Entity\CouCourseDegreeSubject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CouCourseDegreeSubject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CouCourseDegreeSubject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CouCourseDegreeSubject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CouCourseDegreeSubject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CouCourseDegreeSubject findOrCreate($search, callable $callback = null, $options = [])
 */
class CouCourseDegreeSubjectsTable extends Table
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

        $this->setTable('cou_course_degree_subjects');
        $this->setDisplayField('cou_degree_id');
        $this->setPrimaryKey(['cou_degree_id', 'cou_subject_id', 'year']);

        $this->belongsTo('CouDegrees', [
            'foreignKey' => 'cou_degree_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CouSubjects', [
            'foreignKey' => 'cou_subject_id',
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
            ->scalar('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

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
        $rules->add($rules->existsIn(['cou_degree_id'], 'CouDegrees'));
        $rules->add($rules->existsIn(['cou_subject_id'], 'CouSubjects'));

        return $rules;
    }
}
