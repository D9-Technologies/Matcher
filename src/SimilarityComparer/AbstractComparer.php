<?php

/*
 * (c) Zing Studios LLC
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\SimilarityComparer;

abstract class AbstractComparer implements SimilarityComparerInterface
{
    private int $options;

    public function __construct(int $options = 0)
    {
        $this->options = $options;
    }

    protected function isOptionEnabled(int $option): bool
    {
        return $this->options & $option;
    }
}
