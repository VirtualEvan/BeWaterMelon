<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CouDegrees Model
 *
 * @property \App\Model\Table\CouCourseDegreeSubjectsTable|\Cake\ORM\Association\HasMany $CouCourseDegreeSubjects
 *
 * @method \App\Model\Entity\CouDegree get($primaryKey, $options = [])
 * @method \App\Model\Entity\CouDegree newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CouDegree[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CouDegree|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CouDegree patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CouDegree[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CouDegree findOrCreate($search, callable $callback = null, $options = [])
 */
class CouDegreesTable extends Table
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

        $this->setTable('cou_degrees');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('CouCourseDegreeSubjects', [
            'foreignKey' => 'cou_degree_id'
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
            ->scalar('link')
            ->requirePresence('link', 'create')
            ->notEmpty('link');

        return $validator;
    }
}
