<?php
/*
 * (c) Zing Studios LLC
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\SimilarityComparer;

interface SimilarityResultInterface
{
    public function getScore(): int;

    public function isExactMatch(): bool;
}