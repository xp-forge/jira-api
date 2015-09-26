<?php namespace com\atlassian\jira\unittest\api\types;

use unittest\TestCase;
use com\atlassian\jira\api\types\JiraProject;

class JiraProjectTest extends TestCase {
  private $fixture;
  
  /** @return void */
  public function setUp() {
    $this->fixture= new JiraProject();
  }
  
  #[@test]
  public function instance() {
    $this->assertInstanceOf('com.atlassian.jira.api.types.JiraProject', $this->fixture);
  }
  
  #[@test]
  public function self() {
    $this->fixture->setSelf('http://server/path/to/jira/project/1');
    $this->assertEquals('http://server/path/to/jira/project/1', $this->fixture->getSelf());
  }
  
  #[@test]
  public function id() {
    $this->fixture->setId(12345);
    $this->assertEquals(12345, $this->fixture->getId());
  }
  
  #[@test]
  public function key() {
    $this->fixture->setKey('PROJECT1');
    $this->assertEquals('PROJECT1', $this->fixture->getKey());
  }
  
  #[@test]
  public function name() {
    $this->fixture->setName('Project #1');
    $this->assertEquals('Project #1', $this->fixture->getName());
  }
  
  #[@test]
  public function avatarUrls() {
    $this->fixture->setAvatarUrls($urls= [
      '16x16' => 'http://server/path/to/jira/secure/projectavatar?size=small&pid=1&avatarId=1',
      '48x48' => 'http://server/path/to/jira/secure/projectavatar?pid=1&avatarId=1'
    ]);
    $this->assertEquals($urls, $this->fixture->getAvatarUrls());
  }
}

