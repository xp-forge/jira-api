<?php namespace com\atlassian\jira\api\types;

/**
 * Represent the JIRA status
 *
 * @see https://developer.atlassian.com/display/JIRADEV/The+Shape+of+an+Issue+in+JIRA+REST+APIs
 * @test xp://com.atlassian.jira.unittest.api.types.JiraStatusTest
 * @purpose  Issue
 */
class JiraStatus extends \lang\Object {
  protected
    $self= null,
    $id= null,
    $iconUrl= null,
    $name= null;
  
  /**
   * Return self reference
   * 
   * @return string
   */
  public function getSelf() {
    return $this->self;
  }

  /**
   * Set self reference
   * 
   * @param string self The self reference
   */
  public function setSelf($self) {
    $this->self= $self;
  }

  /**
   * Return id
   * 
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set id
   * 
   * @param int id The id
   */
  public function setId($id) {
    $this->id= $id;
  }
  /**
   * Return icon URL
   * 
   * @return string
   */
  public function getIconUrl() {
    return $this->iconUrl;
  }

  /**
   * Set icon URL
   * 
   * @param string iconUrl The URL
   */
  public function setIconUrl($iconUrl) {
    $this->iconUrl= $iconUrl;
  }

  /**
   * Return short name of issue type
   * 
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Set short name of issue type
   * 
   * @param string name The name
   */
  public function setName($name) {
    $this->name= $name;
  }
  
  /**
   * Return string representation
   * 
   * @return string
   */
  public function toString() {
    return $this->getId().' ('.$this->getName().')';
  }
}

