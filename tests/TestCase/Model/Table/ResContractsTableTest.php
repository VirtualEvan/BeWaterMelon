<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResContractsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResContractsTable Test Case
 */
class ResContractsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResContractsTable
     */
    public $ResContracts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.res_contracts',
        'app.res_contract_participants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ResContracts') ? [] : ['className' => ResContractsTable::class];
        $this->ResContracts = TableRegistry::get('ResContracts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResContracts);

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
