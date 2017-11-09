<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CouDegreesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CouDegreesTable Test Case
 */
class CouDegreesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CouDegreesTable
     */
    public $CouDegrees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cou_degrees',
        'app.cou_course_degree_subjects',
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
        $config = TableRegistry::exists('CouDegrees') ? [] : ['className' => CouDegreesTable::class];
        $this->CouDegrees = TableRegistry::get('CouDegrees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CouDegrees);

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
}
