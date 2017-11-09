<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResContractParticipantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResContractParticipantsTable Test Case
 */
class ResContractParticipantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResContractParticipantsTable
     */
    public $ResContractParticipants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.res_contract_participants',
        'app.res_contracts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ResContractParticipants') ? [] : ['className' => ResContractParticipantsTable::class];
        $this->ResContractParticipants = TableRegistry::get('ResContractParticipants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResContractParticipants);

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
