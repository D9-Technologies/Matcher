<?php
/*
 * (c) Zing Studios LLC
 * (c) D9 Technologies
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D9\Matcher\Preprocessor;

class StrToLowerPreprocessor implements PreprocessorInterface
{
    /**
     * @param string $string
     * @return string
     */
    public function __invoke(string $string): string
    {
        return mb_strtolower($string);
    }
}
