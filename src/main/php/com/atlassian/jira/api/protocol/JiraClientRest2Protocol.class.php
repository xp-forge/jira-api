<?php namespace com\atlassian\jira\api\protocol;

use peer\URL;
use peer\http\BasicAuthorization;
use webservices\rest\RestClient;


/**
 * JIRA client protocol interface
 *
 * @test xp://com.atlassian.jira.unittest.api.protocol.JiraClientRest2ProtocolTest
 * @purpose  Interface
 */
class JiraClientRest2Protocol extends \lang\Object implements JiraClientProtocol {
  protected
    $url= null,
    $con= null;
  
  /**
   * Constructor
   * 
   * @param peer.URL The url to connect to 
   */
  public function __construct($u) {
    $this->url= $u;
    $this->con= new RestClient($this->url);
  }
  
  /**
   * Set trace
   * 
   * @param util.log.LogCategory cat The logger
   */
  public function setTrace($cat) {
    $this->con->setTrace($cat);
  }
  
  /**
   * Issue a request
   *  
   * @param string path The path
   * @param mixed[] args The arguments
   * @return webservices.rest.RestResponse
   */
  protected function req($path, $args= []) {
    $req= create(new \webservices\rest\RestRequest())
      ->withHeader(new BasicAuthorization($this->url->getUser(), $this->url->getPassword()))
      ->withResource(rtrim($this->url->getPath(), '/').$path)
      ->withMethod(\peer\http\HttpConstants::GET);
    
    foreach ($args as $name => $value) {
      $req->addParameter($name, $value);
    }
    
    return $this->con->execute($req);
  }
  
  /**
   * Login with given user and password
   * 
   * @param string user The user name
   * @param string password The user's password
   * @return bool
   */
  public function login($user, $password) {
    $this->url->setUser($user);
    $this->url->setPassword($password);
    
    return true;
  }
  
  /**
   * Retrieve issue details
   * 
   * @param string name The name of the issue
   * @return  
   */
  public function getIssue($name) {
    return $this
      ->req('/issue/'.$name)
      ->data('com.atlassian.jira.api.types.JiraIssue');
  }
  
  /**
   * Query for issues
   *  
   * @param com.atlassian.jira.api.query.AbstractJiraQuery query The query to issue
   */
  public function queryIssues($query) {
    return $this
      ->req('/search', array_merge(['jql' => $query->getQuery()], $query->getParameters()))
      ->data('com.atlassian.jira.api.query.JiraQueryResult');
  }
  
  /**
   * Process gadget
   * 
   * @param com.atlassian.jira.api.gadget.JiraGadget gadget The gadget
   * @return com.atlassian.jira.api.gadget.JiraGadgetResult
   */
  public function gadget($gadget, $action) {
    $response= $this->req(sprintf('/../../gadget/%s/%s/%s',
      $gadget->getVersion(),
      $gadget->getName(),
      $action
    ), $gadget->getParams());

    $result= \lang\XPClass::forName($gadget->getResultClass());
    
    return $result instanceof JiraGadgetReslt
      ? $result->newInstance($response->data())
      : $response->data($result);
  }
}

