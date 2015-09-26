<?php namespace com\atlassian\jira\api\gadget;

/**
 * JIRA gadget result container
 *
 * @purpose  Gadget result
 */
class JiraGadgetResult extends \lang\Object {
  private
    $data= null;
  
  /**
   * Constructor
   * 
   * @param mixed[] data The result data
   */
  public function __construct($data= []) {
    $this->data= $data;
  }
  
  /**
   * Return data
   * 
   * @return mixed[]
   */
  public function getData() {
    return $this->data;
  }
  
  /**
   * Set data
   * 
   * @param mixed[] data The data
   */
  public function setData($data) {
    $this->data= $data;
  }
}

