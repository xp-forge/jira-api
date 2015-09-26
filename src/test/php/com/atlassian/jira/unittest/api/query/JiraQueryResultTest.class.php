<?php namespace com\atlassian\jira\unittest\api\query;

use unittest\TestCase;
use com\atlassian\jira\api\query\JiraQueryResult;
use com\atlassian\jira\api\types\JiraIssue;

class JiraQueryResultTest extends TestCase {
  private $fixture;
  
  /** @return void */
  public function setUp() {
    $this->fixture= new JiraQueryResult();
  }
  
  #[@test]
  public function instance() {
    $this->assertInstanceOf('com.atlassian.jira.api.query.JiraQueryResult', $this->fixture);
  }
  
  #[@test]
  public function maxResults() {
    $this->fixture->setMaxResults(100);
    $this->assertEquals(100, $this->fixture->getMaxResults());
  }
  
  #[@test]
  public function startAt() {
    $this->fixture->setStartAt(20);
    $this->assertEquals(20, $this->fixture->getStartAt());
  }
  
  #[@test]
  public function total() {
    $this->fixture->setTotal(1000);
    $this->assertEquals(1000, $this->fixture->getTotal());
  }
  
  #[@test]
  public function issues() {
    $this->fixture->setIssues($issues= [new JiraIssue(), new JiraIssue()]);
    $this->assertEquals($issues, $this->fixture->getIssues());
  }
}

