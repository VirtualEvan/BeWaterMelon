<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrePressesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrePressesTable Test Case
 */
class PrePressesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrePressesTable
     */
    public $PrePresses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pre_presses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PrePresses') ? [] : ['className' => PrePressesTable::class];
        $this->PrePresses = TableRegistry::get('PrePresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrePresses);

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
