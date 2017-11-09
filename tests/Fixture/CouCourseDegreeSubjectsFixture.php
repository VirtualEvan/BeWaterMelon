<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CouCourseDegreeSubjectsFixture
 *
 */
class CouCourseDegreeSubjectsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'cou_degree_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cou_subject_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'year' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'collate' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'degree_idxs' => ['type' => 'index', 'columns' => ['cou_degree_id'], 'length' => []],
            'subject_idxs' => ['type' => 'index', 'columns' => ['cou_subject_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['cou_degree_id', 'cou_subject_id', 'year'], 'length' => []],
            'degree' => ['type' => 'foreign', 'columns' => ['cou_degree_id'], 'references' => ['cou_degrees', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
            'subject' => ['type' => 'foreign', 'columns' => ['cou_subject_id'], 'references' => ['cou_subjects', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'cou_degree_id' => 1,
            'cou_subject_id' => 1,
            'year' => 'd42a5b78-15cd-4dec-a7c2-605fac196a01'
        ],
    ];
}
