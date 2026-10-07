<?php
/*
 * (c) Zing Studios LLC
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\TieBreaker;

use D9\Matcher\Exception\LengthException;
use D9\Matcher\Exception\TieException;
use D9\Matcher\MatchResultInterface;

/**
 * Doesn't really break a tie, instead it throws a TieException
 */
final class ThrowException implements TieBreakerInterface
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(string $needle, array $tiedResults): MatchResultInterface
    {
        if (count($tiedResults) === 0) {
            throw new LengthException('Argument $tiedResults cannot be an empty array.');
        }

        throw new TieException($tiedResults);
    }
}
