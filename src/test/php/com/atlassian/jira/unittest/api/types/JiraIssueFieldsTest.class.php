<?php namespace com\atlassian\jira\unittest\api\types;

use util\Date;
use com\atlassian\jira\api\types\JiraProject;
use com\atlassian\jira\api\types\JiraIssueFields;
use com\atlassian\jira\api\types\JiraIssueType;
use com\atlassian\jira\api\types\JiraPerson;
use com\atlassian\jira\api\types\JiraPriority;
use com\atlassian\jira\api\types\JiraStatus;

/**
 * Test JiraIssueFields class
 */
class JiraIssueFieldsTest extends \unittest\TestCase {
  protected $fixture;
  
  /**
   * Set up
   * 
   * @return void 
   */
  public function setUp() {
    $this->fixture= new JiraIssueFields();
  }
  
  /**
   * Test instance
   *  
   */
  public function instance() {
    $this->assertClass($this->fixture, 'com.atlassian.jira.api.types.JiraIssueFields');
  }
  
  /**
   * Test summary
   *  
   */
  #[@test]
  public function summary() {
    $this->fixture->setSummary('Description of issue');
    $this->assertEquals('Description of issue', $this->fixture->getSummary());
  }
  
  /**
   * Test issueType
   *  
   */
  #[@test]
  public function issueType() {
    $this->fixture->setIssueType($type= new JiraIssueType());
    $this->assertEquals($type, $this->fixture->getIssueType());
  }
  
  /**
   * Test reporter
   *  
   */
  #[@test]
  public function reporter() {
    $this->fixture->setReporter($person= new JiraPerson());
    $this->assertEquals($person, $this->fixture->getReporter());
  }
  
  /**
   * Test created
   *  
   */
  #[@test]
  public function created() {
    $this->fixture->setCreated($date= Date::now());
    $this->assertEquals($date, $this->fixture->getCreated());
  }
  
  /**
   * Test updated
   *  
   */
  #[@test]
  public function updated() {
    $this->fixture->setUpdated($date= Date::now());
    $this->assertEquals($date, $this->fixture->getUpdated());
  }
  
  /**
   * Test priority
   * 
   */
  #[@test]
  public function priority() {
    $this->fixture->setPriority($p= new JiraPriority());
    $this->assertEquals($p, $this->fixture->getPriority());
  }
  
  /**
   * Test description
   * 
   */
  #[@test]
  public function description() {
    $this->fixture->setDescription('Short description');
    $this->assertEquals('Short description', $this->fixture->getDescription());
  }
  
  /**
   * Test status
   *  
   */
  #[@test]
  public function status() {
    $this->fixture->setStatus($status= new JiraStatus());
    $this->assertEquals($status, $this->fixture->getStatus());
  }
  
  /**
   * Test labels
   * 
   */
  #[@test]
  public function labels() {
    $this->fixture->setLabels($labels= array('Technology', 'Development'));
    $this->assertEquals($labels, $this->fixture->getLabels());
  }
  
  /**
   * Test project
   *  
   */
  #[@test]
  public function project() {
    $this->fixture->setProject($project= new JiraProject());
    $this->assertEquals($project, $this->fixture->getProject());
  }
  
  /**
   * Test components
   *  
   */
  #[@test]
  public function components() {
    $this->fixture->setComponents($comps= array(new \com\atlassian\jira\api\types\JiraComponent(), new \com\atlassian\jira\api\types\JiraComponent()));
    $this->assertEquals($comps, $this->fixture->getComponents());
  }
  
  /**
   * Test resolutionDate
   *  
   */
  #[@test]
  public function resolutionDate() {
    $this->fixture->setResolutionDate($date= Date::now());
    $this->assertEquals($date, $this->fixture->getResolutionDate());
  }
  
  /**
   * Test duedate
   *  
   */
  #[@test]
  public function duedate() {
    $this->fixture->setDuedate($date= Date::now());
    $this->assertEquals($date, $this->fixture->getDuedate());
  }
  
  /**
   * Test watchers
   *  
   */
  #[@test]
  public function watchers() {
    $this->fixture->setWatchers($persons= array(new JiraPerson(), new JiraPerson()));
    $this->assertEquals($persons, $this->fixture->getWatchers());
  }
  
  /**
   * Test assignee
   *  
   */
  #[@test]
  public function assignee() {
    $this->fixture->setAssignee($person= new JiraPerson());
    $this->assertEquals($person, $this->fixture->getAssignee());
  }
}

