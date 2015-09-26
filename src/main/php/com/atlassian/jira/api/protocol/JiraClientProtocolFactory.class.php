<?php namespace com\atlassian\jira\api\protocol;

use peer\URL;
use lang\IllegalArgumentException;
use lang\XPClass;

/**
 * JIRA client protocol factory
 *
 * @test  xp://com.atlassian.unittest.api.JiraClientProtocolFactoryTest
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
    if (strstr($u->getPath(), '/rest/api/2')) {
      return XPClass::forName('com.atlassian.jira.api.protocol.JiraClientRest2Protocol')->newInstance($u);
    } else {
      throw new IllegalArgumentException('No suitable client found for '.$url);
    }
  }
}
