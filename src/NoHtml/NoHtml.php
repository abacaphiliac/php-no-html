<?php

namespace NoHtml;

class NoHtml
{
    /**
     * @source https://paragonie.com/blog/2015/06/preventing-xss-vulnerabilities-in-php-everything-you-need-know
     * @param $input
     * @param string $encoding
     * @return string
     */
    public static function filter($input, $encoding = 'UTF-8')
    {
        return htmlentities($input, ENT_QUOTES | ENT_HTML5, $encoding);
    }
}
