<?php

/*
 * (c) Zing Studios LLC and James Haynes
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher;

interface MatcherInterface
{
    public const ALLOW_EXACT_MATCH_TIES = 1;

    public function match(string $needle, array $haystack): MatchResultInterface;
}
