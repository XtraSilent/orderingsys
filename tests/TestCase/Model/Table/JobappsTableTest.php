<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobappsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobappsTable Test Case
 */
class JobappsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobappsTable
     */
    public $Jobapps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.jobapps',
        'app.departments',
        'app.users',
        'app.roles',
        'app.orders',
        'app.menus',
        'app.stocks',
        'app.deliveries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Jobapps') ? [] : ['className' => JobappsTable::class];
        $this->Jobapps = TableRegistry::get('Jobapps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Jobapps);

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
