<?php

/*
 * (c) Zing Studios LLC
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\Tests\TieBreaker;

use PHPUnit\Framework\TestCase;
use D9\Matcher\Exception\LengthException;
use D9\Matcher\MatchResult;
use D9\Matcher\SimilarityComparer\Levenshtein\LevensteinSimilarityResult;
use D9\Matcher\TieBreaker\LastMatch;

/**
 * @covers \D9\Matcher\TieBreaker\LastMatch
 */
class LastMatchTest extends TestCase
{
    public function testLastMatchReturned()
    {
        $firstResult = new MatchResult('Test1', new LevensteinSimilarityResult(1));
        $lastResult = new MatchResult('Test2', new LevensteinSimilarityResult(1));

        $result = (new LastMatch())(
            'needle',
            [
                $firstResult,
                $lastResult,
            ]
        );

        $this->assertEquals($lastResult, $result);
        $this->assertSame($lastResult, $result);
    }

    /**
     * Verifies that a LengthException is throw if an empty array is passed
     * as the $tiedResults argument
     */
    public function testWillThrowOnEmptyResults()
    {
        $this->expectException(LengthException::class);
        $this->expectDeprecationMessage('Argument $tiedResults cannot be an empty array.');

        (new LastMatch())('needle', []);
    }
}
