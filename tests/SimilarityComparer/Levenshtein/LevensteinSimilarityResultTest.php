<?php

/*
 * (c) Zing Studios LLC and James Haynes
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\Tests\SimilarityComparer\Levenshtein;

use PHPUnit\Framework\TestCase;
use D9\Matcher\SimilarityComparer\Levenshtein\LevensteinSimilarityResult;

/**
 * @covers \D9\Matcher\SimilarityComparer\Levenshtein\LevensteinSimilarityResult
 */
class LevensteinSimilarityResultTest extends TestCase
{
    /**
     * Verifies that construction of the result value object
     * and it's getters work as expected.
     */
    public function testValueObject()
    {
        $result = new LevensteinSimilarityResult(
            13
        );

        $this->assertEquals(13, $result->getScore());
    }
}
