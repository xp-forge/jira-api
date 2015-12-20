<?php namespace com\atlassian\jira\unittest\api\types;

use unittest\TestCase;
use com\atlassian\jira\api\types\JiraStatus;

class JiraStatusTest extends TestCase {
  private $fixture;
  
  /** @return void */
  public function setUp() {
    $this->fixture= new JiraStatus();
  }
  
  #[@test]
  public function instance() {
    $this->assertInstanceOf(JiraStatus::class, $this->fixture);
  }
  
  #[@test]
  public function self() {
    $this->fixture->setSelf('http://server/path/to/jira/status/1');
    $this->assertEquals('http://server/path/to/jira/status/1', $this->fixture->getSelf());
  }
  
  #[@test]
  public function id() {
    $this->fixture->setId(12345);
    $this->assertEquals(12345, $this->fixture->getId());
  }
  
  #[@test]
  public function iconUrl() {
    $this->fixture->setIconUrl('http://server/path/to/jira/images/icons/status.gif');
    $this->assertEquals('http://server/path/to/jira/images/icons/status.gif', $this->fixture->getIconUrl());
  }
  
  #[@test]
  public function name() {
    $this->fixture->setName('Resolved');
    $this->assertEquals('Resolved', $this->fixture->getName());
  }
  
  #[@test]
  public function testToString() {
    $this->fixture->setId(1);
    $this->fixture->setName('Resolved');
    $this->assertEquals('1 (Resolved)', $this->fixture->toString());
  }
}

