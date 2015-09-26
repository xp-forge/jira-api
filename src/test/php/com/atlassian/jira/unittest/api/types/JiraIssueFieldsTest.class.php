<?php namespace com\atlassian\jira\unittest\api\types;

use util\Date;
use com\atlassian\jira\api\types\JiraProject;
use com\atlassian\jira\api\types\JiraIssueFields;
use com\atlassian\jira\api\types\JiraIssueType;
use com\atlassian\jira\api\types\JiraPerson;
use com\atlassian\jira\api\types\JiraPriority;
use com\atlassian\jira\api\types\JiraStatus;
use com\atlassian\jira\api\types\JiraComponent;

class JiraIssueFieldsTest extends \unittest\TestCase {
  private $fixture;
  
  /** @return void */
  public function setUp() {
    $this->fixture= new JiraIssueFields();
  }
  
  #[@test]
  public function instance() {
    $this->assertInstanceOf('com.atlassian.jira.api.types.JiraIssueFields', $this->fixture);
  }
  
  #[@test]
  public function summary() {
    $this->fixture->setSummary('Description of issue');
    $this->assertEquals('Description of issue', $this->fixture->getSummary());
  }
  
  #[@test]
  public function issueType() {
    $this->fixture->setIssueType($type= new JiraIssueType());
    $this->assertEquals($type, $this->fixture->getIssueType());
  }
  
  #[@test]
  public function reporter() {
    $this->fixture->setReporter($person= new JiraPerson());
    $this->assertEquals($person, $this->fixture->getReporter());
  }
  
  #[@test]
  public function created() {
    $this->fixture->setCreated($date= Date::now());
    $this->assertEquals($date, $this->fixture->getCreated());
  }
  
  #[@test]
  public function updated() {
    $this->fixture->setUpdated($date= Date::now());
    $this->assertEquals($date, $this->fixture->getUpdated());
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
    $this->fixture->setStatus($status= new JiraStatus());
    $this->assertEquals($status, $this->fixture->getStatus());
  }
  
  #[@test]
  public function labels() {
    $this->fixture->setLabels($labels= ['Technology', 'Development']);
    $this->assertEquals($labels, $this->fixture->getLabels());
  }
  
  #[@test]
  public function project() {
    $this->fixture->setProject($project= new JiraProject());
    $this->assertEquals($project, $this->fixture->getProject());
  }
  
  #[@test]
  public function components() {
    $this->fixture->setComponents($comps= [new JiraComponent(), new JiraComponent()]);
    $this->assertEquals($comps, $this->fixture->getComponents());
  }
  
  #[@test]
  public function resolutionDate() {
    $this->fixture->setResolutionDate($date= Date::now());
    $this->assertEquals($date, $this->fixture->getResolutionDate());
  }
  
  #[@test]
  public function duedate() {
    $this->fixture->setDuedate($date= Date::now());
    $this->assertEquals($date, $this->fixture->getDuedate());
  }
  
  #[@test]
  public function watchers() {
    $this->fixture->setWatchers($persons= [new JiraPerson(), new JiraPerson()]);
    $this->assertEquals($persons, $this->fixture->getWatchers());
  }
  
  #[@test]
  public function assignee() {
    $this->fixture->setAssignee($person= new JiraPerson());
    $this->assertEquals($person, $this->fixture->getAssignee());
  }
}

