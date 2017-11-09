<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PplCollaboratorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PplCollaboratorsTable Test Case
 */
class PplCollaboratorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PplCollaboratorsTable
     */
    public $PplCollaborators;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ppl_collaborators'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PplCollaborators') ? [] : ['className' => PplCollaboratorsTable::class];
        $this->PplCollaborators = TableRegistry::get('PplCollaborators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PplCollaborators);

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
