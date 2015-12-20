JIRA API ChangeLog
========================================================================

## ?.?.? / ????-??-??

## 3.0.0 / 2015-12-20

* **Heads up: Dropped PHP 5.4 support**. *Note: As the main source is not
  touched, unofficial PHP 5.4 support is still available though not tested
  with Travis-CI*.
  (@thekid)

## 2.1.0 / 2015-09-27

* Added support for PHP 7
  (@thekid)
* Added compatibility with XP 6.5.0: Refrain from using `create()`, use
  new `assertInstanceOf()` instead of deprecated `assertClass()`.
  (@thekid)

## 2.0.3 / 2015-09-26

* QA: Migrated codebase to use PHP 5.4 short array syntax (@thekid)

## 2.0.2 / 2015-04-22

* Fixed JiraClient class - (@ohinckel, @thekid)

## 2.0.1 / 2015-02-12

* Changed dependency to use XP ~6.0 (instead of dev-master) - @thekid

## 2.0.0 / 2015-01-11

* Heads up: Changed Google-Search to depend on XP6 core (@thekid)
* Migrated code to namespaces (@thekid)

## 1.0.1 / 2013-01-07

* Fixed adding authorization header by using the addHeader() function
  correctly
  (@pdietz)
* Refactored the query API a little bit and introduced `JqlQuery` class
  (@thekid)

## 1.0.0 / 2012-09-17

* Initial JIRA API implementation (@ohinckel)

