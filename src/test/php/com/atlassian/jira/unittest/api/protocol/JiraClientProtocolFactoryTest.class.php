<?php namespace com\atlassian\jira\unittest\api\protocol;

use com\atlassian\jira\api\protocol\JiraClientRest2Protocol;
use lang\IllegalArgumentException;
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
    $this->assertInstanceOf(JiraClientRest2Protocol::class, $this->fixture->forURL('http://server/rest/api/2/'));
  }
  
  /**
   * Test no suiteable protocol
   *  
   */
  #[@test, @expect(IllegalArgumentException::class)]
  public function noSuitable() {
    $this->fixture->forURL('http://server/a/wrong/url/');
  }
}
