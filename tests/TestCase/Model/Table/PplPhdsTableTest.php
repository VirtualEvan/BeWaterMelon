<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PplPhdsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PplPhdsTable Test Case
 */
class PplPhdsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PplPhdsTable
     */
    public $PplPhds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ppl_phds'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PplPhds') ? [] : ['className' => PplPhdsTable::class];
        $this->PplPhds = TableRegistry::get('PplPhds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PplPhds);

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
