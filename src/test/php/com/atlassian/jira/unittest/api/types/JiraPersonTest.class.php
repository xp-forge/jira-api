<?php namespace com\atlassian\jira\unittest\api\types;

use unittest\TestCase;
use com\atlassian\jira\api\types\JiraPerson;

class JiraPersonTest extends TestCase {
  private $fixture;
  
  /** @return void */
  public function setUp() {
    $this->fixture= new JiraPerson();
  }
  
  #[@test]
  public function instance() {
    $this->assertInstanceOf(JiraPerson::class, $this->fixture);
  }
  
  #[@test]
  public function self() {
    $this->fixture->setSelf('http://server/path/to/jira/user?username=user1');
    $this->assertEquals('http://server/path/to/jira/user?username=user1', $this->fixture->getSelf());
  }
  
  #[@test]
  public function name() {
    $this->fixture->setName('user1');
    $this->assertEquals('user1', $this->fixture->getName());
  }
  
  #[@test]
  public function emailAddress() {
    $this->fixture->setEmailAddress('user@domain.tld');
    $this->assertEquals('user@domain.tld', $this->fixture->getEmailAddress());
  }
  
  #[@test]
  public function avatarUrls() {
    $this->fixture->setAvatarUrls($urls= [
      '16x16' => 'http://server/path/to/jira/secure/useravatar?size=small&avatarId=1',
      '48x48' => 'http://server/path/to/jira/secure/useravatar?avatarId=1'
    ]);
    $this->assertEquals($urls, $this->fixture->getAvatarUrls());
  }
  
  #[@test]
  public function displayName() {
    $this->fixture->setDisplayName('User Name');
    $this->assertEquals('User Name', $this->fixture->getDisplayName());
  }
  
  #[@test]
  public function active() {
    $this->fixture->setActive(true);
    $this->assertTrue($this->fixture->getActive());
  }
}

