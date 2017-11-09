<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActEditorialBoardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActEditorialBoardsTable Test Case
 */
class ActEditorialBoardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActEditorialBoardsTable
     */
    public $ActEditorialBoards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.act_editorial_boards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ActEditorialBoards') ? [] : ['className' => ActEditorialBoardsTable::class];
        $this->ActEditorialBoards = TableRegistry::get('ActEditorialBoards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActEditorialBoards);

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
