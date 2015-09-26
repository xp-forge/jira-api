<?php namespace com\atlassian\jira\unittest\api\query;

use unittest\TestCase;
use com\atlassian\jira\api\query\JqlQuery;

class JqlQueryTest extends TestCase {

  #[@test]
  public function jql_passed_through() {
    $jql= 'column = "empty"';
    $this->assertEquals($jql, (new JqlQuery($jql))->getQuery());
  }

  #[@test, @expect('lang.IllegalArgumentException')]
  public function jql_may_not_be_empty() {
    new JqlQuery('');
  }

  #[@test, @expect('lang.IllegalArgumentException')]
  public function jql_may_not_be_null() {
    new JqlQuery(null);
  }
}
