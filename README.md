PHPUnit Immediate Exception Printer
===================================

[![Latest version][Version image]][Releases]
[![Total downloads][Downloads image]][Downloads]
[![Build status][Build image]][Build]
[![Test coverage][Coverage image]][Coverage]
[![Code style][Style image]][Style]

Immediate Exception Printer is a [PHPUnit][PHPUnit] plug-in that prints out exceptions and assertion failures immediately during a test run. Normally PHPUnit keeps error details secret until the end of the test run, but sometimes we don't want to wait that long. With Immediate Exception Printer, all secrets are immediately revealed, with a few extra benefits, too.

## Benefits

* Immediately prints out exceptions and assertion failures as they occur.
* Displays the execution time of each test in tiered colour bands.
* Displays the name of each test case as it is executed.

## Preview

The following preview is somewhat atypical but shows all tested output cases this printer supports.

![Preview image](https://raw.githubusercontent.com/ScriptFUSION/PHPUnit-Immediate-Exception-Printer/master/doc/images/test%20run%201.0.png)

## Inspiration

Thanks to the following open source projects that inspired this project. Keep being awesome :thumbsup:.

* [diablomedia/phpunit-pretty-printer](https://github.com/diablomedia/phpunit-pretty-printer)
* [whatthejeff/nyancat-phpunit-resultprinter](https://github.com/whatthejeff/nyancat-phpunit-resultprinter)
* [skyzyx/phpunit-result-printer](https://github.com/skyzyx/phpunit-result-printer)


  [Releases]: https://github.com/ScriptFUSION/PHPUnit-Immediate-Exception-Printer/releases
  [Version image]: https://poser.pugx.org/scriptfusion/phpunit-immediate-exception-printer/version "Latest version"
  [Downloads]: https://packagist.org/packages/scriptfusion/phpunit-immediate-exception-printer
  [Downloads image]: https://poser.pugx.org/scriptfusion/phpunit-immediate-exception-printer/downloads "Total downloads"
  [Build]: https://travis-ci.org/ScriptFUSION/PHPUnit-Immediate-Exception-Printer
  [Build image]: https://travis-ci.org/ScriptFUSION/PHPUnit-Immediate-Exception-Printer.svg?branch=master "Build status"
  [Coverage]: https://coveralls.io/github/ScriptFUSION/PHPUnit-Immediate-Exception-Printer
  [Coverage image]: https://coveralls.io/repos/ScriptFUSION/PHPUnit-Immediate-Exception-Printer/badge.svg "Test coverage"
  [Style]: https://styleci.io/repos/83920053
  [Style image]: https://styleci.io/repos/83920053/shield?style=flat "Code style"

  [PHPUnit]: https://github.com/sebastianbergmann/phpunit
