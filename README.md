[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/abacaphiliac/php-no-html/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/abacaphiliac/php-no-html/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/abacaphiliac/php-no-html/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/abacaphiliac/php-no-html/?branch=master)
[![Build Status](https://travis-ci.org/abacaphiliac/php-no-html.svg?branch=master)](https://travis-ci.org/abacaphiliac/php-no-html)

# abacaphiliac/php-no-html

## Description
Safely encode content for rendering in an HTML document.

## Brief XSS Mitigation Guide
A quote from (Paragon Initiative's blog)[https://paragonie.com/blog/2015/06/preventing-xss-vulnerabilities-in-php-everything-you-need-know]:
1. If your framework has a templating engine that offers automatic contextual filtering, use that.
1. `echo htmlentities($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');` is a safe and effective way to stop all XSS attacks on a UTF-8 encoded web page, but doesn't allow any HTML.
1. If your requirements allow you to use Markdown instead of HTML, don't use HTML.
1. If you need to allow some HTML and aren't using a templating engine (see #1), use HTML Purifier.

## Installation
```bash
composer require abacaphiliac/php-no-html
```

## Usage
The following code is an example of an XSS exploit:
```
$userName = 'Bob"/><script>alert('XSS');</script>';
?><input name="UserName" value="<?=$value;?>" /><?php
```

Simply escape the value in the response to prevent the exploit:
```
$userName = 'Bob"/><script>alert('XSS');</script>';
?><input name="UserName" value="<?=\NoHtml\NoHtml::filter($value);?>" /><?php
```

## Dependencies
See [composer.json](composer.json).

## Contributing
```
composer update && vendor/bin/phing
```

This library attempts to comply with [PSR-1][], [PSR-2][], and [PSR-4][]. If
you notice compliance oversights, please send a patch via pull request.

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md
