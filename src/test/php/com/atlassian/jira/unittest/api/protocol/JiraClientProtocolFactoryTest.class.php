<?php namespace com\atlassian\jira\unittest\api\protocol;

use unittest\TestCase;
use com\atlassian\jira\api\protocol\JiraClientProtocolFactory;


/**
 * Test JIRA client protocol factory
 *
 * @purpose  Test
 */
class JiraClientProtocolFactoryTest extends TestCase {
  protected
    $fixture= null;
  
  /**
   * Set up
   * 
   */
  public function setUp() {
    $this->fixture= new JiraClientProtocolFactory();
  }
  
  /**
   * Test for REST API v2 client
   *  
   */
  #[@test]
  public function restV2() {
    $this->assertInstanceOf('com.atlassian.jira.api.protocol.JiraClientRest2Protocol', $this->fixture->forURL('http://server/rest/api/2/'));
  }
  
  /**
   * Test no suiteable protocol
   *  
   */
  #[@test, @expect('lang.IllegalArgumentException')]
  public function noSuitable() {
    $this->fixture->forURL('http://server/a/wrong/url/');
  }
}
