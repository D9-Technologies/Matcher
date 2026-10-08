<?php

/*
 * (c) Zing Studios LLC
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\SimilarityComparer\SimilarText;

use D9\Matcher\SimilarityComparer\SimilarityResultInterface;

class SimilarTextSwappedAverageComparer extends SimilarTextComparer
{
    public function compare(string $needle, string $hay): SimilarityResultInterface
    {
        /**
         * @var SimilarTextSimilarityResult $result1
         */
        $result1 = parent::compare($needle, $hay);

        /**
         * @var SimilarTextSimilarityResult $result2
         */
        $result2 = parent::compare($hay, $needle);

        return new SimilarTextSimilarityResult(
            (int)(($result1->getScore() + $result2->getScore()) / 2),
            ($result1->getPercent() + $result2->getPercent()) / 2
        );
    }

}
