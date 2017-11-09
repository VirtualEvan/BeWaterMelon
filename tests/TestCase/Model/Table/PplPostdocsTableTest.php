<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PplPostdocsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PplPostdocsTable Test Case
 */
class PplPostdocsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PplPostdocsTable
     */
    public $PplPostdocs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ppl_postdocs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PplPostdocs') ? [] : ['className' => PplPostdocsTable::class];
        $this->PplPostdocs = TableRegistry::get('PplPostdocs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PplPostdocs);

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
