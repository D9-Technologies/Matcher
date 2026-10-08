<?php

/*
 * (c) Zing Studios LLC and James Haynes
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\Tests;

use PHPUnit\Framework\TestCase;
use D9\Matcher\Exception\LengthException;
use D9\Matcher\MatchResultInterface;
use D9\Matcher\Preprocessor\MetaphonePreprocessor;
use D9\Matcher\SimilarityComparer\Levenshtein\LevensteinComparer;
use D9\Matcher\SimilarityComparer\SimilarText\SimilarTextSwappedAverageComparer;
use D9\Matcher\Suggester;

/**
 * @covers \D9\Matcher\Suggester
 */
class SuggesterTest extends TestCase
{
    /**
     * Verifies that the default case-sensitive matching,
     * will return a result that matches the case exactly
     * as the best match.
     */
    public function testSuggestCaseSensitive()
    {
        $haystack = [
            'apple',
            'pineapple',
            'banana',
            'orange',
            'radish',
            'carrOT',
            'carrot',
            'Carrot',
            'CARROT',
            'pea',
            'bean',
            'potato'
        ];

        $matcher = new Suggester(new LevensteinComparer());
        $results = $matcher->suggest('Carrot', $haystack);

        $resultStrs = array_map(function (MatchResultInterface $result) {
            return $result->getString();
        }, $results);

        $this->assertEquals(
            [
                'Carrot',
                'carrot',
                'carrOT',
                'apple',
                'banana',
                'radish',
                'CARROT',
                'orange',
                'pea',
                'bean',
                'potato',
                'pineapple',
            ],
            $resultStrs
        );
    }

    /**
     * Verifies that the default case-sensitive matching,
     * will return a result that matches the case exactly
     * as the best match.
     */
    public function testSuggestMetaphone()
    {
        $haystack = [
            'some text',
            'some other text',
            'wheel of time',
            'there is never enough time',
            'snitches get stitches',
            'a stitch in time saves nine',
            'cats have nine lives',
        ];

        $matcher = new Suggester(new SimilarTextSwappedAverageComparer(), [new MetaphonePreprocessor()]);
        $results = $matcher->suggest('i stitched nine times', $haystack);

        $resultStrs = array_map(function (MatchResultInterface $result) {
            return $result->getString();
        }, $results);

        $this->assertEquals(
            [
                'a stitch in time saves nine',
                'there is never enough time',
                'snitches get stitches',
                'cats have nine lives',
                'wheel of time',
                'some text',
                'some other text',
            ],
            $resultStrs
        );
    }


    /**
     * Verifies that a LengthException is throw if an empty array is passed
     * as the $haystack argument
     */
    public function testWillThrowOnEmptyHaystack()
    {
        $this->expectException(LengthException::class);
        $this->expectDeprecationMessage('Argument $haystack cannot be an empty array.');

        $matcher = new Suggester(
            new LevensteinComparer()
        );

        $matcher->suggest('test', []);
    }
}
