<?php namespace com\atlassian\jira\unittest\api\query;

use unittest\TestCase;
use com\atlassian\jira\api\query\JiraQueryCriteria;
use com\atlassian\jira\api\query\JiraQueryOp;

class JiraQueryCriteriaTest extends TestCase {
  private $fixture; 
  
  /** @return void */
  public function setUp() {
    $this->fixture= new JiraQueryCriteria('column', 'empty', JiraQueryOp::$EQUALS);
  }

  #[@test]
  public function instance() {
    $this->assertInstanceOf('com.atlassian.jira.api.query.JiraQueryCriteria', $this->fixture);
  }
  
  #[@test]
  public function simpleQuery() {
    $this->assertEquals('column = "empty"', $this->fixture->getQuery());
  }
  
  #[@test]
  public function andQuery() {
    $this->assertEquals(
      'column = "empty" and otherColumn = "value"',
      $this->fixture
        ->addAnd('otherColumn', 'value', JiraQueryOp::$EQUALS)
        ->getQuery()
    );
  }
  
  #[@test]
  public function orQuery() {
    $this->assertEquals(
      'column = "empty" or otherColumn = "value"',
      $this->fixture
        ->addOr('otherColumn', 'value', JiraQueryOp::$EQUALS)
        ->getQuery()
    );
  }
  
  #[@test]
  public function nestedAndQuery() {
    $this->assertEquals(
      'column = "empty" or (otherColumn = "value" and anotherColumn = "value")',
      $this->fixture
        ->addOr((new JiraQueryCriteria('otherColumn', 'value', JiraQueryOp::$EQUALS))
          ->addAnd('anotherColumn', 'value', JiraQueryOp::$EQUALS)
        )
        ->getQuery()
    );
  }
  
  #[@test]
  public function nestedOrQuery() {
    $this->assertEquals(
      'column = "empty" or (otherColumn = "value" or anotherColumn = "value")',
      $this->fixture
        ->addOr((new JiraQueryCriteria('otherColumn', 'value', JiraQueryOp::$EQUALS))
          ->addOr('anotherColumn', 'value', JiraQueryOp::$EQUALS)
        )
        ->getQuery()
    );
  }
  
  #[@test]
  public function multipleTopLevelQuery() {
    $this->fixture= new JiraQueryCriteria();
    $this->fixture->add((new JiraQueryCriteria('column', 'empty', JiraQueryOp::$EQUALS))
      ->addAnd('otherColumn', 'value', JiraQueryOp::$EQUALS)
    );
    $this->fixture->addOr((new JiraQueryCriteria('column', 'value', JiraQueryOp::$EQUALS))
      ->addAnd('otherColumn', 'empty', JiraQueryOp::$EQUALS)
    );
    
    $this->assertEquals(
      '(column = "empty" and otherColumn = "value") or (column = "value" and otherColumn = "empty")',
      $this->fixture->getQuery()
    );
  }
  
  #[@test]
  public function singleTopLevelQuery() {
    $this->fixture= new JiraQueryCriteria();
    $this->fixture->add(new JiraQueryCriteria('column', 'empty', JiraQueryOp::$EQUALS));
    $this->fixture->addAnd((new JiraQueryCriteria())
      ->add((new JiraQueryCriteria())
        ->add('this', 'that', JiraQueryOp::$EQUALS)
        ->addAnd('that', 'this', JiraQueryOp::$EQUALS)
      )
      ->addOr((new JiraQueryCriteria())
        ->add('that', 'this', JiraQueryOp::$EQUALS)
        ->addAnd('this', 'that', JiraQueryOp::$EQUALS)
      )
    );
    
    $this->assertEquals(
      'column = "empty" and ((this = "that" and that = "this") or (that = "this" and this = "that"))',
      $this->fixture->getQuery()
    );
  }
}

