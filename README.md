jira-api
========
Atlassian JIRA client API for XP Framework

Usage example
--
First of all, you need to include the JiraClient class which can be used easily to access the JIRA resources. The following shows a short code example how to use it:

```php
<?php
  uses(
    'com.atlassian.jira.api.JiraClient',
    'com.atlassian.jira.api.query.JiraQuery',
    'com.atlassian.jira.api.query.JiraQueryOp'
  );

  // Create client (credentials missing here!)
  $c= new JiraClient('https://jira.example.com/rest/api/2/');

  // Query for issues
  $issues= $c->queryIssues(create(new JiraQuery())
    ->add('status', 'Open', JiraQueryOp::$EQUALS)
    ->addAnd('project', 'BIT', JiraQueryOp::$EQUALS)
  );

  // Print out list of issues
  foreach ($issues as $issue) {
    Console::writeLinef(
      '==> %s: %s (%s)',
      $issue->getKey(),
      $issue->getSummary(),
      $issue->getStatus()->toString()
    );
  }
?>
```

The classes
-- 
The current implementation has the following classes:

* com.atlassian.jira.api.JiraClient - the client class which is the main entry point for the application
* com.atlassian.jira.api.query.JiraQuery - the query object which can be used to build the query
* com.atlassian.jira.api.query.JiraQueryCriteria - a more complex query object which can be used to build a complex query (see below)
* com.atlassian.jira.api.query.JiraQueryOp - the query operators which can be used (equals, greater, ...)
* com.atlassian.jira.api.query.JiraQueryResult - the query result object which contains all information returned for a query
 
The different types:

* com.atlassian.jira.api.types.JiraProject - a representation for the JIRA project
* com.atlassian.jira.api.types.JiraComponent - a representation for the JIRA component
* com.atlassian.jira.api.types.JiraIssue - a representation for the JIRA issue* com.atlassian.jira.api.types.JiraPerson - a representation for a person
* com.atlassian.jira.api.types.JiraPriority - a representation for the issue  priority
* com.atlassian.jira.api.types.JiraStatus - a representation of the issue status
* com.atlassian.jira.api.types.JiraIssueType - a representation of the issue type
 
The gadgets currently implemented:

* com.atlassian.jira.api.gadget.JiraStatsGadget - Generates a list of issue statistic (e.g. assigned issues by person)
* com.atlassian.jira.api.gadget.JiraCreatedVsResolvedGadget - Shows a statistics chart for created vs. resolved issues for a given query or filter

Using a gadget
--
Gadget are extension for JIRA which does some "magic". For example it can do special reports or generates some fancy charts. The following example is using the statistics gadget:

```php
<?php
  $result= $client->generateGadget($gadget= create(new JiraStatsGadget())
    ->withProjectOrFilterId('filter-11675')  // Bugs assigned to iDev
  );
  $n= $stats->addChild(new Node('gadget', NULL, array(
    'name'   => $gadget->getName(),
    'title'  => $result->getFilterOrProjectName(),
    'issues' => $result->getTotalIssueCount()
  )));
  foreach ($result->getRows() as $row){
    $n->addChild(new Node('person', strip_tags($row['html']), array(
      'percent' => $row['percentage'],
      'count'   => $row['count']
    )));
  }
?>
```


JQL query example
--
```php
<?php
  uses(
    'com.atlassian.jira.api.JiraClient',
    'com.atlassian.jira.api.query.JqlQuery'
  );

  // Create client (credentials missing here!)
  $c= new JiraClient('https://jira.example.com/rest/api/2/');

  // Query for issues
  $issues= $c->queryIssues(new JqlQuery('status = "Open" and project = "Example"'));

  // Print out list of issues
  foreach ($issues as $issue) {
    Console::writeLinef(
      '==> %s: %s (%s)',
      $issue->getKey(),
      $issue->getSummary(),
      $issue->getStatus()->toString()
    );
  }
?>
```
