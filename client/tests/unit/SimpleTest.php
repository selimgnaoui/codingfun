<?php 
class SimpleTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $service;
    protected function _before()
    {
        $this->service =  new \App\Library\Service\ApiService();

    }

    protected function _after()
    {
    }

    // tests
    public function testingRatinbyTrainer()
    {
        $trainer = 'yes';

        $result = ($this->service->getPointfromtrainer($trainer));

        $this->assertEquals(3, $result);

    }
    public function testingRatinbymmlz()
    {
        $mlz = 7;

        $result = ($this->service->getPointfrommlz($mlz));

        $this->assertEquals(1, $result);

    }

}