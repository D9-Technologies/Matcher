<?php

/*
 * (c) Zing Studios LLC and James Haynes
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\Tests\TieBreaker;

use PHPUnit\Framework\TestCase;
use D9\Matcher\Exception\LengthException;
use D9\Matcher\Exception\TieException;
use D9\Matcher\MatchResult;
use D9\Matcher\SimilarityComparer\Levenshtein\LevensteinSimilarityResult;
use D9\Matcher\TieBreaker\ThrowException;

/**
 * @covers \D9\Matcher\TieBreaker\ThrowException
 */
class ThrowExceptionTest extends TestCase
{
    public function testWillThrowTieException()
    {
        $tiedResults = [
            new MatchResult('Test1', new LevensteinSimilarityResult(1)),
            new MatchResult('Test2', new LevensteinSimilarityResult(1)),
        ];

        try {
            (new ThrowException())('needle', $tiedResults);

            $this->fail(
                sprintf(
                    'Expected exception %s was not thrown.',
                    TieException::class
                )
            );
        } catch (TieException $e) {
            $this->assertEquals($tiedResults, $e->getTiedResults());
        }
    }

    /**
     * Verifies that a LengthException is throw if an empty array is passed
     * as the $tiedResults argument
     */
    public function testWillThrowOnEmptyResults()
    {
        $this->expectException(LengthException::class);
        $this->expectDeprecationMessage('Argument $tiedResults cannot be an empty array.');

        (new ThrowException())('needle', []);
    }
}
