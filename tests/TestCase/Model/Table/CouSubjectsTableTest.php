<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CouSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CouSubjectsTable Test Case
 */
class CouSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CouSubjectsTable
     */
    public $CouSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cou_subjects',
        'app.ppl_users',
        'app.cou_course_degree_subjects',
        'app.cou_degrees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CouSubjects') ? [] : ['className' => CouSubjectsTable::class];
        $this->CouSubjects = TableRegistry::get('CouSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CouSubjects);

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
