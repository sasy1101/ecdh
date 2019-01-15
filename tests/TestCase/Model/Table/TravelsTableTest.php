<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TravelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TravelsTable Test Case
 */
class TravelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TravelsTable
     */
    public $Travels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Travels',
        'app.Cars',
        'app.Passengers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Travels') ? [] : ['className' => TravelsTable::class];
        $this->Travels = TableRegistry::getTableLocator()->get('Travels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Travels);

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
