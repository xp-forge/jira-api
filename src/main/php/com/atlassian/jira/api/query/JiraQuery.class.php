<?php
/* This class is part of the XP framework
 *
 * $Id$ 
 */

  /**
   * JIRA query object
   *
   * @purpose  Query
   */
  class JiraQuery extends Object {
    const
      EQUALS=         '=',
      NOT_EQUALS=     '!=',
      GREATER_THAN=   '>',
      GREATER_EQUALS= '>=',
      LESS_THAN=      '<',
      LESS_EQUALS=    '<=';
    
    const
      OP_AND= 'and',
      OP_OR=  'or';
    
    protected
      $what= NULL,
      $value= NULL,
      $op= NULL,
      $next= array();
    
    /**
     * Constructor
     * 
     * @param string what The subject of the query
     * @param string value The value to compare
     * @param string op The query operator (see constants)
     */
    public function __construct($what, $value, $op) {
      $this->what= $what;
      $this->value= $value;
      $this->op= $op;
    }
    
    /**
     * Add and query
     * 
     * @param com.atlassian.jira.api.query.JiraQuery query The query to add 
     * @return com.atlassian.jira.api.query.JiraQuery
     */
    public function addAnd($query) {
      $this->next[]= array(self::OP_AND, $query);
      
      return $this;
    }
    
    /**
     * Add or query
     * 
     * @param com.atlassian.jira.api.query.JiraQuery query The query to add 
     * @return com.atlassian.jira.api.query.JiraQuery
     */
    public function addOr($query) {
      $this->next[]= array(self::OP_OR, $query);
      
      return $this;
    }
    
    /**
     * Return size of sub queries
     * 
     * @return int
     */
    public function size() {
      return sizeof($this->next);
    }
    
    /**
     * Return JQL query string
     * 
     * @return string 
     */
    public function getQuery() {
      $jql= sprintf('%s %s %s', $this->what, $this->op, $this->value);
      foreach ($this->next as $query) $jql .= sprintf(
        ' %s %s',
        $query[0],
        $query[1]->size() ? '('.$query[1]->getQuery().')' : $query[1]->getQuery()
      );
      return $jql;
    }
  }

?>
