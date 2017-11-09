<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PubBooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PubBooksTable Test Case
 */
class PubBooksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PubBooksTable
     */
    public $PubBooks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pub_books',
        'app.physicals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PubBooks') ? [] : ['className' => PubBooksTable::class];
        $this->PubBooks = TableRegistry::get('PubBooks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PubBooks);

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
