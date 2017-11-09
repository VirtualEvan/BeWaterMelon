<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActConferenceYearsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActConferenceYearsTable Test Case
 */
class ActConferenceYearsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActConferenceYearsTable
     */
    public $ActConferenceYears;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.act_conference_years',
        'app.act_conferences'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ActConferenceYears') ? [] : ['className' => ActConferenceYearsTable::class];
        $this->ActConferenceYears = TableRegistry::get('ActConferenceYears', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActConferenceYears);

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
