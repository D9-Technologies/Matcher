<?php

/*
 * (c) Zing Studios LLC
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\Tests\Preprocessor;

use PHPUnit\Framework\TestCase;
use D9\Matcher\Preprocessor\MetaphonePreprocessor;

/**
 * @covers \D9\Matcher\Preprocessor\MetaphonePreprocessor
 */
class MetaphonePreprocessorTest extends TestCase
{
    /**
     * Verifies that we get 0 for an exact match.
     * @return void
     */
    public function testMetaphonePreprocessor()
    {
        //Verify that we produce an exact match result for strings
        //with multibyte characters.
        $this->assertEquals('IM0WLRS', (new MetaphonePreprocessor())('I am the walrus'));
    }

    /**
     * Verifies that we get 0 for an exact match.
     * @return void
     */
    public function testMetaphonePreprocessorMaxPhonemes()
    {
        //Verify that we produce an exact match result for strings
        //with multibyte characters.
        $this->assertEquals('IM', (new MetaphonePreprocessor(2))('I am the walrus'));
    }
}
