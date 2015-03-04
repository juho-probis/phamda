<?php

/*
 * This file is part of the Phamda library
 *
 * (c) Mikael Pajunen <mikael.pajunen@gmail.com>
 *
 * For the full copyright and license information, please see the LICENSE
 * file that was distributed with this source code.
 */

namespace Phamda\Tests;

class ConstructableConcat
{
    private $string;

    public function __construct($a, $b, $c)
    {
        $this->string = $a . $b . $c;
    }

    public function __toString()
    {
        return $this->string;
    }
}