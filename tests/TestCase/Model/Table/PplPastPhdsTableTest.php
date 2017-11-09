<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PplPastPhdsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PplPastPhdsTable Test Case
 */
class PplPastPhdsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PplPastPhdsTable
     */
    public $PplPastPhds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ppl_past_phds'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PplPastPhds') ? [] : ['className' => PplPastPhdsTable::class];
        $this->PplPastPhds = TableRegistry::get('PplPastPhds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PplPastPhds);

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
