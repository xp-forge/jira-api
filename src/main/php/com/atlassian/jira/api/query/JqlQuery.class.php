<?php namespace com\atlassian\jira\api\query;



/**
 * JQL query object - raw JQL queries
 *
 */
class JqlQuery extends AbstractJiraQuery {
  protected $jql= '';

  /**
   * Constructor
   * 
   * @param  string jql
   * @throws lang.IllegalArgumentException
   */
  public function __construct($jql) {
    if ('' === ($this->jql= (string)$jql)) {
      throw new \lang\IllegalArgumentException('Given argument may not be null or empty');
    }
  }
  
  /**
   * Return JQL query string
   * 
   * @return string 
   */
  public function getQuery() {
    return $this->jql;
  }
  
  /**
   * Return string representation
   * 
   * @return string 
   */
  public function toString() {
    return nameof($this).'{ '.$this->getQuery().' }';
  }
}
