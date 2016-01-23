<?php namespace com\atlassian\jira\api\query;

/**
 * Base class for all JIRA queries
 *
 * @see  xp://com.atlassian.jira.api.query.JiraQuery
 * @see  xp://com.atlassian.jira.api.query.JqlQuery
 */
abstract class AbstractJiraQuery extends \lang\Object {

  /**
   * Return JQL query string
   * 
   * @return string 
   */
  public abstract function getQuery();
  
  /**
   * Return string representation
   * 
   * @return string 
   */
  public function toString() {
    return nameof($this).'{ '.$this->getQuery().' }';
  }
}
