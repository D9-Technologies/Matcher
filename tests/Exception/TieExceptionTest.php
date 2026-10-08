<?php

/*
 * (c) Zing Studios LLC
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\Tests\Exception;

use PHPUnit\Framework\TestCase;
use D9\Matcher\Exception\TieException;
use D9\Matcher\Result;
use D9\Matcher\SimilarityComparer\Levenshtein\LevensteinSimilarityResult;

/**
 * @covers \D9\Matcher\Exception\TieException
 */
class TieExceptionTest extends TestCase
{
    /**
     * Verifies that the results that are passed when making the exception
     * are the same as those return by getTiedResults.
     */
    public function testGetTieResults()
    {
        $tiedResults = [
            new LevensteinSimilarityResult( 1),
            new LevensteinSimilarityResult( 1),
        ];

        $exception = new TieException($tiedResults);

        $this->assertEquals($tiedResults, $exception->getTiedResults());
    }
}
