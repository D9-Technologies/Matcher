<?php

/*
 * (c) Zing Studios LLC and James Haynes
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher;

use D9\Matcher\SimilarityComparer\SimilarityResultInterface;

final class MatchResult implements MatchResultInterface
{
    private string $string;
    private SimilarityResultInterface $similarityResult;

    public function __construct(
        string $string,
        SimilarityResultInterface $similarityResult
    ) {
        $this->string = $string;
        $this->similarityResult = $similarityResult;
    }

    public function getString(): string
    {
        return $this->string;
    }

    public function getSimilarityResult(): SimilarityResultInterface
    {
        return $this->similarityResult;
    }
}
