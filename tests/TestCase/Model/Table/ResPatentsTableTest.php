<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResPatentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResPatentsTable Test Case
 */
class ResPatentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResPatentsTable
     */
    public $ResPatents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.res_patents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ResPatents') ? [] : ['className' => ResPatentsTable::class];
        $this->ResPatents = TableRegistry::get('ResPatents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResPatents);

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
