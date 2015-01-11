<?php namespace com\atlassian\jira\api\protocol;

use peer\URL;
use lang\IllegalArgumentException;


/**
 * JIRA client protocol factory
 *
 * @test xp://com.atlassian.unittest.api.JiraClientProtocolFactoryTest
 * @purpose  Protocol factory
 */
class JiraClientProtocolFactory extends \lang\Object {
  
  /**
   * Create client by inspecting the URL
   * 
   * @param string url The API url
   * @return com.atlassian.jira.api.JiraClientProtocol
   */
  public static function forURL($url) {
    $u= new URL($url);
    
    // Check for REST API client v2
    if (create(new \lang\types\String($u->getPath()))->contains('/rest/api/2')) {
      return \lang\XPClass::forName('com.atlassian.jira.api.protocol.JiraClientRest2Protocol')->newInstance($u);
      
    // No suitable protocol found
    } else {
      throw new IllegalArgumentException('No suitable client found for '.$url);
    }
  }
}
