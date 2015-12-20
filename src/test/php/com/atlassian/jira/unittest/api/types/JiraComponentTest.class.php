<?php namespace com\atlassian\jira\unittest\api\types;

use unittest\TestCase;
use com\atlassian\jira\api\types\JiraComponent;

class JiraComponentTest extends TestCase {
  private $fixture;
  
  /** @return void */
  public function setUp() {
    $this->fixture= new JiraComponent();
  }
  
  #[@test]
  public function instance() {
    $this->assertInstanceOf(JiraComponent::class, $this->fixture);
  }
  
  #[@test]
  public function self() {
    $this->fixture->setSelf('http://server/path/to/jira/component/1');
    $this->assertEquals('http://server/path/to/jira/component/1', $this->fixture->getSelf());
  }
  
  #[@test]
  public function id() {
    $this->fixture->setId(12345);
    $this->assertEquals(12345, $this->fixture->getId());
  }
  
  #[@test]
  public function name() {
    $this->fixture->setName('Component1');
    $this->assertEquals('Component1', $this->fixture->getName());
  }
  
  #[@test]
  public function description() {
    $this->fixture->setDescription('Some component');
    $this->assertEquals('Some component', $this->fixture->getDescription());
  }
}

