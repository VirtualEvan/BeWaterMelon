<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColGroupsTable Test Case
 */
class ColGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ColGroupsTable
     */
    public $ColGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.col_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ColGroups') ? [] : ['className' => ColGroupsTable::class];
        $this->ColGroups = TableRegistry::get('ColGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ColGroups);

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
