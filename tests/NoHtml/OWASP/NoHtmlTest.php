<?php

namespace PhpNoHtmlTest;

class NoHtmlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @source https://www.owasp.org/index.php/XSS_Filter_Evasion_Cheat_Sheet
     * @return array[]
     */
    public function dataOWASP()
    {
        $exploits = [];
        
        foreach (new \DirectoryIterator(__DIR__ . '/exploits') as $file) {
            if ($file->isFile()) {
                $exploits[$file->getBasename()] = [file_get_contents($file->getRealPath())];
            }
        }
        
        return $exploits;
    }

    /**
     * @dataProvider dataOWASP
     * @param mixed $value
     */
    public function testOWASP($value)
    {
        self::assertNotEmpty($value);
        
        $actual = \NoHtml\noHtml($value);
        
        self::assertNotEmpty($actual);
        self::assertNotContains('<', $actual);
        self::assertNotContains('>', $actual);
        self::assertNotContains('"', $actual);
        self::assertNotContains("'", $actual);
    }
}
