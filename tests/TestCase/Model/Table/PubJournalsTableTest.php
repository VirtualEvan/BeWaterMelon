<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PubJournalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PubJournalsTable Test Case
 */
class PubJournalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PubJournalsTable
     */
    public $PubJournals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pub_journals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PubJournals') ? [] : ['className' => PubJournalsTable::class];
        $this->PubJournals = TableRegistry::get('PubJournals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PubJournals);

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
