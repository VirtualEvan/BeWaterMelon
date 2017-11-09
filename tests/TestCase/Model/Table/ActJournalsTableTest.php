<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActJournalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActJournalsTable Test Case
 */
class ActJournalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActJournalsTable
     */
    public $ActJournals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.act_journals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ActJournals') ? [] : ['className' => ActJournalsTable::class];
        $this->ActJournals = TableRegistry::get('ActJournals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActJournals);

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
