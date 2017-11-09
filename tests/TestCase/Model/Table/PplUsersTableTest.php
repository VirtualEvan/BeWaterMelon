<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PplUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PplUsersTable Test Case
 */
class PplUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PplUsersTable
     */
    public $PplUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ppl_users',
        'app.cou_subjects',
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
        $config = TableRegistry::exists('PplUsers') ? [] : ['className' => PplUsersTable::class];
        $this->PplUsers = TableRegistry::get('PplUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PplUsers);

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
