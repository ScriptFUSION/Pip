<p align="center"><img src="doc/images/logo.webp" alt="Pip" width="350"></p>
<div align="center">

[![Latest version][Version image]][Releases]
[![Total downloads][Downloads image]][Downloads]
[![Build status][Build image]][Build]
[![Test coverage][Coverage image]][Coverage]
</div>

PHPUnit Immediate Printer
=========================

Pip is a [PHPUnit][] extension that immediately prints exceptions and assertion failures during a test run. Normally PHPUnit keeps failure details secret until the end of the test run, but sometimes we don't want to wait that long. With Pip, all secrets are immediately revealed, with a few extra benefits, too.

## Benefits

* Display the name of each test case as it is executed.
* Display the execution time of each test in tiered colour bands.
* Immediately print exceptions and assertion failures as they occur.
* Flawless test suite indicator: success dot turns to red exclamation mark if any prior tests failed. Useful for CI consoles without a scrollback buffer.

## Preview

The following preview is somewhat atypical but shows all supported output cases at once. Of course, we expect all *your* tests to be green!

![Preview image][]

This printer makes no attempt to modify the test summary; only runtime output is changed.

## Usage

1. Add the dependency to your Composer file's `require-dev` section.

    ```bash
    composer require --dev scriptfusion/pip
    ```

2. Declare the printer class in your `phpunit.xml` configuration file.

    ```xml
    <extensions>
        <bootstrap class="ScriptFUSION\Pip\PipExtension"/>
    </extensions>
    ```

3. Run the tests!

    ```bash
    vendor/bin/phpunit
    ```

4. Enjoy immediate test execution feedback.

## Requirements

| Pip version | PHPUnit versions | Minimum PHP |
|:-----------:|:----------------:|:-----------:|
|      3      |     10 / 11      |  8.1 / 8.2  |
|      2      |     *yanked*     |      -      |
|      1      |      5 / 6       |  5.6 / 7.0  |

## Testing

The printer's capabilities are exploited via `CapabilitiesTest`. However, this test file isn't run directly because many of these tests are designed to fail. Instead, we write tests that run PHPUnit internally, each of which invokes one of the capability test cases and verifies its output.

The real tests, also known as *functional tests*, are located in `test/functional`, written in PHPT format. PHPT is a [scarcely documented format](http://qa.php.net/phpt_details.php) designed to support [testing PHP itself](https://qa.php.net/write-test.php). An undocumented feature of PHPUnit is its limited support for a subset of the PHPT test specification, which we exploit to test PHPUnit itself with our printer implementation loaded.

To run the tests, simply specify `vendor/bin/phpunit -c test` on the command line from the project directory. By default, we run all the functional PHPT tests. To run `CapabilitiesTest` instead, specify `vendor/bin/phpunit -c test test/CapabilitiesTest`.

### Writing a functional test

To test the output of a particular capability we run `CapabilitiesTest` with the `--filter` option to target a specific test case. Each functional test contains the arguments passed to PHPUnit in the `--ARGS--` section of the file. These arguments can be pasted directly after the PHPUnit command to see the resulting output from that test case. We verify the output in the `--EXPECTF--` section of the file.

One challenge we must overcome is verifying coloured output including ANSI escape sequences. To see these escape sequences we can pipe the output of a specific capability test to `cat -v` as shown in the following example.

```bash
vendor/bin/phpunit -c test --colors=always test/CapabilitiesTest.php --filter ::testSuccess$ | cat -v
```

The output from `cat` will print the "escape" character as `^[`. We must replace each occurrence of this character sequence with the literal escape character (ASCII character 27). The easiest way to obtain the real escape character is to just copy it from an existing functional test.

Create a new functional test by copying an existing test as a template, then modify the PHPUnit arguments and the expected output to match what we expect using the techniques just described. Don't forget to give the test a clear description in the `--TEST--` section!

## Inspiration

Thanks to the following open source projects that inspired this project. Keep being awesome :thumbsup:.

* [diablomedia/phpunit-pretty-printer](https://github.com/diablomedia/phpunit-pretty-printer) &ndash; Design and implementation.
* [whatthejeff/nyancat-phpunit-resultprinter](https://github.com/whatthejeff/nyancat-phpunit-resultprinter) &ndash; Testing.
* [skyzyx/phpunit-result-printer](https://github.com/skyzyx/phpunit-result-printer) &ndash; Design.


  [Releases]: https://github.com/ScriptFUSION/PHPUnit-Immediate-Printer/releases
  [Version image]: https://poser.pugx.org/scriptfusion/pip/version "Latest version"
  [Downloads]: https://packagist.org/packages/scriptfusion/pip
  [Downloads image]: https://poser.pugx.org/scriptfusion/pip/downloads "Total downloads"
  [Build]: https://github.com/ScriptFUSION/PHPUnit-Immediate-Printer/actions/workflows/Test.yaml
  [Build image]: https://github.com/ScriptFUSION/PHPUnit-Immediate-Printer/actions/workflows/Test.yaml/badge.svg "Build status"
  [Coverage]: https://codecov.io/gh/ScriptFUSION/PHPUnit-Immediate-Printer
  [Coverage image]: https://codecov.io/github/ScriptFUSION/PHPUnit-Immediate-Printer/graph/badge.svg "Test coverage"

  [Preview image]: https://raw.githubusercontent.com/ScriptFUSION/PHPUnit-Immediate-Printer/master/doc/images/test%20run%203.0.webp

  [PHPUnit]: https://github.com/sebastianbergmann/phpunit
