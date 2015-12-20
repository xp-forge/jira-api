<?php namespace com\atlassian\jira\unittest\api\types;

use unittest\TestCase;
use com\atlassian\jira\api\types\JiraIssue;
use com\atlassian\jira\api\types\JiraIssueFields;
use com\atlassian\jira\api\types\JiraPriority;
use com\atlassian\jira\api\types\JiraStatus;
use com\atlassian\jira\api\types\JiraPerson;

class JiraIssueTest extends \unittest\TestCase {
  private $fixture;
  
  /** @return void */
  public function setUp() {
    $this->fixture= new JiraIssue();
    $this->fixture->setFields(new JiraIssueFields());
  }
  
  #[@test]
  public function instance() {
    $this->assertInstanceOf(JiraIssue::class, $this->fixture);
  }
  
  #[@test]
  public function self() {
    $this->fixture->setSelf('http://server/path/to/jira/KEY-1');
    $this->assertEquals('http://server/path/to/jira/KEY-1', $this->fixture->getSelf());
  }
  
  #[@test]
  public function id() {
    $this->fixture->setId(12345);
    $this->assertEquals(12345, $this->fixture->getId());
  }

  #[@test]
  public function key() {
    $this->fixture->setKey('COMP-100');
    $this->assertEquals('COMP-100', $this->fixture->getKey());
  }
  
  #[@test]
  public function fields() {
    $this->fixture->setFields($fields= new JiraIssueFields());
    $this->assertEquals($fields, $this->fixture->getFields());
  }
  
  #[@test]
  public function priority() {
    $this->fixture->setPriority($p= new JiraPriority());
    $this->assertEquals($p, $this->fixture->getPriority());
  }
  
  #[@test]
  public function description() {
    $this->fixture->setDescription('Short description');
    $this->assertEquals('Short description', $this->fixture->getDescription());
  }
  
  #[@test]
  public function status() {
    $this->fixture->setStatus($s= new JiraStatus());
    $this->assertEquals($s, $this->fixture->getStatus());
  }
  
  #[@test]
  public function labels() {
    $this->fixture->setLabels($labels= ['Technology', 'Development']);
    $this->assertEquals($labels, $this->fixture->getLabels());
  }
  
  #[@test]
  public function addLabel() {
    $this->fixture->setLabels($labels= ['Technology', 'Development']);
    $this->assertTrue($this->fixture->addLabel($labels[]= 'Important'));
    $this->assertEquals($labels, $this->fixture->getLabels());
  }
  
  #[@test]
  public function addExistantLabel() {
    $this->fixture->setLabels($labels= ['Technology', 'Development']);
    $this->assertFalse($this->fixture->addLabel('Technology'));
    $this->assertEquals($labels, $this->fixture->getLabels());
  }
  
  #[@test]
  public function removeLabel() {
    $this->fixture->setLabels($labels= ['Technology', 'Development']);
    $this->assertTrue($this->fixture->removeLabel('Technology'));
    unset($labels[0]);
    $this->assertEquals($labels, $this->fixture->getLabels());
  }

  #[@test]
  public function removeNonExistantLabel() {
    $this->fixture->setLabels($labels= ['Technology', 'Development']);
    $this->assertFalse($this->fixture->removeLabel('non-existant'));
    $this->assertEquals($labels, $this->fixture->getLabels());
  }
  
  #[@test]
  public function project() {
    $this->fixture->setProject($p= new \com\atlassian\jira\api\types\JiraProject());
    $this->assertEquals($p, $this->fixture->getProject());
  }
  
  #[@test]
  public function summary() {
    $this->fixture->setSummary('Short summary');
    $this->assertEquals('Short summary', $this->fixture->getSummary());
  }
  
  #[@test]
  public function reporter() {
    $this->fixture->setReporter($p= new JiraPerson());
    $this->assertEquals($p, $this->fixture->getReporter());
  }
  
  #[@test]
  public function assignee() {
    $this->fixture->setAssignee($p= new JiraPerson());
    $this->assertEquals($p, $this->fixture->getAssignee());
  }
  
  #[@test]
  public function created() {
    $this->fixture->setCreated($d= \util\Date::now());
    $this->assertEquals($d, $this->fixture->getCreated());
  }
  
  #[@test]
  public function updated() {
    $this->fixture->setUpdated($d= \util\Date::now());
    $this->assertEquals($d, $this->fixture->getUpdated());
  }
}

