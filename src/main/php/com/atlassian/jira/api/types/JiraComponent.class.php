<?php namespace com\atlassian\jira\api\types;

/**
 * Represent the JIRA component
 *
 * @see https://developer.atlassian.com/display/JIRADEV/The+Shape+of+an+Issue+in+JIRA+REST+APIs
 * @test xp://com.atlassian.jira.unittest.api.types.JiraComponentTest
 * @purpose  Component
 */
class JiraComponent extends \lang\Object {
  protected
    $self= null,
    $id= null,
    $name= null,
    $description= null;
  
  /**
   * Get self reference
   * 
   * @return string
   */
  public function getSelf() {
    return $this->self;
  }

  /**
   * Set self reference
   * 
   * @param string self The reference
   */
  public function setSelf($self) {
    $this->self = $self;
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
   * Return name
   * 
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Set name
   * 
   * @param string name The component name
   */
  public function setName($name) {
    $this->name= $name;
  }

  /**
   * Return description
   * 
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * Set description
   * 
   * @param string description The component description
   */
  public function setDescription($description) {
    $this->description= $description;
  }
}

