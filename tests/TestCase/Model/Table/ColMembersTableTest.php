<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColMembersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColMembersTable Test Case
 */
class ColMembersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ColMembersTable
     */
    public $ColMembers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.col_members'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ColMembers') ? [] : ['className' => ColMembersTable::class];
        $this->ColMembers = TableRegistry::get('ColMembers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ColMembers);

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
