<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CouCourseDegreeSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CouCourseDegreeSubjectsTable Test Case
 */
class CouCourseDegreeSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CouCourseDegreeSubjectsTable
     */
    public $CouCourseDegreeSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cou_course_degree_subjects',
        'app.cou_degrees',
        'app.cou_subjects',
        'app.ppl_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CouCourseDegreeSubjects') ? [] : ['className' => CouCourseDegreeSubjectsTable::class];
        $this->CouCourseDegreeSubjects = TableRegistry::get('CouCourseDegreeSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CouCourseDegreeSubjects);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
