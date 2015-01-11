<?php namespace com\atlassian\jira\unittest\api\gadget;

use unittest\TestCase;
use com\atlassian\jira\api\gadget\JiraGadgetResult;


/**
 * Test JIRA gadget result class
 *
 * @purpose  Test
 */
class JiraGadgetResultTest extends TestCase {
  protected
    $fixture= null;
  
  /**
   * Set up
   * 
   */
  public function setUp() {
    $this->fixture= new JiraGadgetResult(array('data' => 'value'));
  }
  
  /**
   * Test instance
   * 
   */
  #[@test]
  public function instance() {
    $this->assertInstanceOf('com.atlassian.jira.api.gadget.JiraGadgetResult', $this->fixture);
  }
  
  /**
   * Test data
   * 
   */
  #[@test]
  public function data() {
    $this->fixture->setData($d= array('data1' => 'value1', 'data2' => 'value2'));
    $this->assertEquals($d, $this->fixture->getData());
  }
  
  /**
   * Test initial constructor data
   * 
   */
  #[@test]
  public function initialData() {
    $this->assertEquals(array('data' => 'value'), $this->fixture->getData());
  }
}

