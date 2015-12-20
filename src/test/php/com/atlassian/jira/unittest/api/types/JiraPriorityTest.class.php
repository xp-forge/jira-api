<?php namespace com\atlassian\jira\unittest\api\types;

use unittest\TestCase;
use com\atlassian\jira\api\types\JiraPriority;

class JiraPriorityTest extends TestCase {
  private $fixture;
  
  /** @return void */
  public function setUp() {
    $this->fixture= new JiraPriority();
  }
  
  public function instance() {
    $this->assertInstanceOf(JiraPriority::class, $this->fixture);
  }
  
  #[@test]
  public function self() {
    $this->fixture->setSelf('http://server/path/to/jira/priority/1');
    $this->assertEquals('http://server/path/to/jira/priority/1', $this->fixture->getSelf());
  }
  
  #[@test]
  public function id() {
    $this->fixture->setId(12345);
    $this->assertEquals(12345, $this->fixture->getId());
  }
  
  #[@test]
  public function iconUrl() {
    $this->fixture->setIconUrl('http://server/path/to/jira/images/icons/priority.gif');
    $this->assertEquals('http://server/path/to/jira/images/icons/priority.gif', $this->fixture->getIconUrl());
  }
  
  #[@test]
  public function name() {
    $this->fixture->setName('Major');
    $this->assertEquals('Major', $this->fixture->getName());
  }
  
  #[@test]
  public function testToString() {
    $this->fixture->setId(3);
    $this->fixture->setName('Major');
    $this->assertEquals('3 (Major)', $this->fixture->toString());
  }
}

