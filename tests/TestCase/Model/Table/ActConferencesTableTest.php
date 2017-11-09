<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActConferencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActConferencesTable Test Case
 */
class ActConferencesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActConferencesTable
     */
    public $ActConferences;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.act_conferences',
        'app.act_conference_years'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ActConferences') ? [] : ['className' => ActConferencesTable::class];
        $this->ActConferences = TableRegistry::get('ActConferences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActConferences);

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
