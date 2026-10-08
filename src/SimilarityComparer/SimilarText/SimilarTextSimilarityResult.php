<?php

/*
 * (c) Zing Studios LLC and James Haynes
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\SimilarityComparer\SimilarText;


use D9\Matcher\SimilarityComparer\SimilarityResultInterface;

final class SimilarTextSimilarityResult implements SimilarityResultInterface
{
    private int $similarity;
    private float $percent;

    public function __construct(
        int $similarity,
        float $percent
    ) {
        $this->similarity = $similarity;
        $this->percent = $percent;
    }

    public function getScore(): int
    {
        return $this->similarity;
    }

    public function isExactMatch(): bool
    {
        return $this->getPercent() == 100;
    }

    public function getPercent(): float
    {
        return $this->percent;
    }
}
