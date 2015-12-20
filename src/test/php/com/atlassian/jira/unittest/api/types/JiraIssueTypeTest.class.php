<?php namespace com\atlassian\jira\unittest\api\types;

use unittest\TestCase;
use com\atlassian\jira\api\types\JiraIssue;
use com\atlassian\jira\api\types\JiraIssueType;

class JiraIssueTypeTest extends TestCase {
  private $fixture;
  
  /** @return void */
  public function setUp() {
    $this->fixture= new JiraIssueType();
  }
  
  #[@test]
  public function instance() {
    $this->assertInstanceOf(JiraIssueType::class, $this->fixture);
  }
  
  #[@test]
  public function self() {
    $this->fixture->setSelf('http://server/path/to/jira/issuetype/1');
    $this->assertEquals('http://server/path/to/jira/issuetype/1', $this->fixture->getSelf());
  }
  
  #[@test]
  public function id() {
    $this->fixture->setId(12345);
    $this->assertEquals(12345, $this->fixture->getId());
  }
  
  #[@test]
  public function description() {
    $this->fixture->setDescription('Some important type');
    $this->assertEquals('Some important type', $this->fixture->getDescription());
  }
  
  #[@test]
  public function iconUrl() {
    $this->fixture->setIconUrl('http://server/path/to/jira/images/icons/type.gif');
    $this->assertEquals('http://server/path/to/jira/images/icons/type.gif', $this->fixture->getIconUrl());
  }
  
  #[@test]
  public function name() {
    $this->fixture->setName('Important');
    $this->assertEquals('Important', $this->fixture->getName());
  }
  
  #[@test]
  public function subtask() {
    $this->fixture->setSubtask(true);
    $this->assertTrue($this->fixture->getSubtask());
  }
  
  #[@test]
  public function testToString() {
    $this->fixture->setId(1);
    $this->fixture->setName('Important');
    $this->assertEquals('1 (Important)', $this->fixture->toString());
  }
}

