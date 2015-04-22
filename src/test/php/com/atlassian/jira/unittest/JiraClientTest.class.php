<?php namespace com\atlassian\jira\unittest;

use com\atlassian\jira\api\JiraClient;

class JiraClientTest extends \unittest\TestCase {

  #[@test]
  public function can_create() {
    new JiraClient('http://jira.example.com/rest/api/2');
  }
}