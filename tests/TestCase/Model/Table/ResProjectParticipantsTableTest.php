<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResProjectParticipantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResProjectParticipantsTable Test Case
 */
class ResProjectParticipantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResProjectParticipantsTable
     */
    public $ResProjectParticipants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.res_project_participants',
        'app.res_projects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ResProjectParticipants') ? [] : ['className' => ResProjectParticipantsTable::class];
        $this->ResProjectParticipants = TableRegistry::get('ResProjectParticipants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResProjectParticipants);

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
