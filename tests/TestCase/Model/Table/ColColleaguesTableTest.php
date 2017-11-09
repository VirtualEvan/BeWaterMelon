<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColColleaguesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColColleaguesTable Test Case
 */
class ColColleaguesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ColColleaguesTable
     */
    public $ColColleagues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.col_colleagues'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ColColleagues') ? [] : ['className' => ColColleaguesTable::class];
        $this->ColColleagues = TableRegistry::get('ColColleagues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ColColleagues);

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
