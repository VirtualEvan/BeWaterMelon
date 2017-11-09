<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColCompaniesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColCompaniesTable Test Case
 */
class ColCompaniesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ColCompaniesTable
     */
    public $ColCompanies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.col_companies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ColCompanies') ? [] : ['className' => ColCompaniesTable::class];
        $this->ColCompanies = TableRegistry::get('ColCompanies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ColCompanies);

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
