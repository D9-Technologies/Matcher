<?php
/*
 * (c) Zing Studios LLC and James Haynes
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\TieBreaker;

use D9\Matcher\MatchResultInterface;

interface TieBreakerInterface
{
    /**
     * @param string $needle
     * @param MatchResultInterface[] $tiedResults
     * @return MatchResultInterface
     */
    public function __invoke(string $needle, array $tiedResults): MatchResultInterface;
}