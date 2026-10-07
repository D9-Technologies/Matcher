<?php

/*
 * (c) Zing Studios LLC
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\SimilarityComparer\Levenshtein;


use D9\Matcher\SimilarityComparer\SimilarityResultInterface;

final class LevensteinSwappedAverageComparer extends LevensteinComparer
{
    public function compare(string $needle, string $hay): SimilarityResultInterface
    {
        $result1 = parent::compare($needle, $hay);
        $result2 = parent::compare($hay, $needle);

        return new LevensteinSimilarityResult(
            (int)(($result1->getScore() + $result2->getScore()) / 2)
        );
    }
}
