<?php namespace com\atlassian\jira\unittest\api\gadget;

use unittest\TestCase;
use com\atlassian\jira\api\gadget\JiraGadget;


/**
 * Test JIRA gadget class
 *
 * @purpose  Test
 */
class JiraGadgetTest extends TestCase {
  protected
    $fixture= null;
  
  /**
   * Set up
   * 
   */
  public function setUp() {
    $this->fixture= new JiraGadget('stats');
  }
  
  /**
   * Test instance
   * 
   */
  #[@test]
  public function instance() {
    $this->assertInstanceOf(JiraGadget::class, $this->fixture);
  }
  
  /**
   * Test name
   * 
   */
  #[@test]
  public function name() {
    $this->fixture->setName('test');
    $this->assertEquals('test', $this->fixture->getName());
  }
  
  /**
   * Test version
   * 
   */
  #[@test]
  public function version() {
    $this->fixture->setVersion('2.0');
    $this->assertEquals('2.0', $this->fixture->getVersion());
  }
  
  /**
   * Test params
   * 
   */
  #[@test]
  public function params() {
    $this->fixture->setParam('param1', 'value1');
    $this->fixture->setParam('param2', 'value2');
    
    $this->assertEquals(['param1' => 'value1', 'param2' => 'value2'], $this->fixture->getParams());
  }
  
  /**
   * Test withParam()
   * 
   */
  #[@test]
  public function withParam() {
    $this->assertEquals($this->fixture, $this->fixture
      ->withParam('param1', 'value1')
      ->withParam('param2', 'value2')
    );
    
    $this->assertEquals(['param1' => 'value1', 'param2' => 'value2'], $this->fixture->getParams());
  }
  
  /**
   * Test setParams()
   * 
   */
  #[@test]
  public function setParams() {
    $this->fixture->setParams($p= ['param1' => 'value1', 'param2' => 'value2']);
    $this->assertEquals($p, $this->fixture->getParams());
  }
  
  /**
   * Test result class
   * 
   */
  #[@test]
  public function resultClass() {
    $this->assertEquals(nameof($this->fixture).'Result', $this->fixture->getResultClass());
  }
}

