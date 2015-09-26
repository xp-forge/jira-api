<?php namespace com\atlassian\jira\unittest\api\protocol;

use unittest\TestCase;
use unittest\PrerequisitesNotMetError;
use peer\URL;
use com\atlassian\jira\api\protocol\JiraClientRest2Protocol;
use com\atlassian\jira\api\query\JiraQuery;
use com\atlassian\jira\api\gadget\JiraGadget;
use com\atlassian\jira\api\query\JiraQueryOp;

class JiraClientRest2ProtocolTest extends TestCase {
  protected
    $url= null,
    $user= null,
    $pass= null,
    $fixture= null;
  
  /**
   * Constructor
   *  
   */
  public function __construct($name, $url= null, $user= null, $pass= null) {
    parent::__construct($name);
    if (null !== $url) {
      $this->url= new URL($url);
      $this->url->setUser($user);
      $this->url->setPassword($pass);
    }
  }
  
  /** @return void */
  public function setUp() {
    if (null === $this->url) {
      throw new PrerequisitesNotMetError('This test requires url, username and password arguments');
    }
    $this->fixture= new JiraClientRest2Protocol($this->url);
  }

  #[@test]
  public function login() {
    $this->fixture->login($this->user, $this->pass);
  }
  
  #[@test]
  public function issue() {
    $this->assertInstanceOf('com.atlassian.jira.api.types.JiraIssue', $this->fixture->getIssue('PPTX-1'));
  }
  
  #[@test]
  public function queryIssues() {
    $result= $this->fixture->queryIssues(new JiraQuery('key', 'PPTX-1', JiraQueryOp::$EQUALS));
    $this->assertInstanceOf('com.atlassian.jira.api.query.JiraQueryResult', $result);
  }
  
  #[@test]
  public function gadget() {
    $this->assertInstanceOf('com.atlassian.jira.api.gadget.JiraGadgetResult', $this->fixture->gadget((new JiraGadget('stats'))
      ->withParam('projectOrFilterId', 'project-12998')
      ->withParam('statType', 'assignees')
      ->withParam('includeResolvedIssues', 'false')
      ->withParam('sortDirection', 'asc')
      ->withParam('sortBy', 'total'),
      'generate'
    ));
  }
}

