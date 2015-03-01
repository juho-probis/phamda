<?php

/*
 * This file is part of the Phamda library
 *
 * (c) Mikael Pajunen <mikael.pajunen@gmail.com>
 *
 * For the full copyright and license information, please see the LICENSE
 * file that was distributed with this source code.
 */

namespace Phamda;

class Phamda
{
    use CoreFunctionsTrait;

    /**
     * @param int|float $a
     * @param int|float $b
     *
     * @return callable|int|float
     */
    public static function add($a = null, $b = null)
    {
        $func = static::curry2(function ($a, $b) {
            return $a + $b;
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param array    $list
     *
     * @return callable|bool
     */
    public static function all(callable $function = null, array $list = null)
    {
        $func = static::curry2(function (callable $function, array $list) {
            foreach ($list as $value) {
                if (! $function($value)) {
                    return false;
                }
            }

            return true;
        });

        return $func(...func_get_args());
    }

    /**
     * @param mixed $value
     *
     * @return callable
     */
    public static function always($value)
    {
        return function () use ($value) {
            return $value;
        };
    }

    /**
     * @param callable $a
     * @param callable $b
     *
     * @return callable
     */
    public static function and_(callable $a = null, callable $b = null)
    {
        $func = static::curry2(function (callable $a, callable $b) {
            return function (... $arguments) use ($a, $b) {
                return $a(...$arguments) && $b(...$arguments);
            };
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param array    $list
     *
     * @return callable|bool
     */
    public static function any(callable $function = null, array $list = null)
    {
        $func = static::curry2(function (callable $function, array $list) {
            foreach ($list as $value) {
                if ($function($value)) {
                    return true;
                }
            }

            return false;
        });

        return $func(...func_get_args());
    }

    /**
     * @param object $object
     *
     * @return callable|mixed
     */
    public static function clone_($object = null)
    {
        $func = static::curry1(function ($object) {
            return clone $object;
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $predicate
     *
     * @return callable
     */
    public static function comparator(callable $predicate = null)
    {
        $func = static::curry1(function (callable $predicate) {
            return function ($a, $b) use ($predicate) {
                return $predicate($a, $b) ? -1 : ($predicate($b, $a) ? 1 : 0);
            };
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable ...$functions
     *
     * @return callable
     */
    public static function compose(... $functions)
    {
        return Phamda::pipe(...array_reverse($functions));
    }

    /**
     * @param string $class
     *
     * @return callable|object
     */
    public static function construct($class = null)
    {
        $func = static::curry1(function ($class) {
            return Phamda::constructN(static::getConstructorArity($class), $class);
        });

        return $func(...func_get_args());
    }

    /**
     * @param int    $arity
     * @param string $class
     *
     * @return callable|object
     */
    public static function constructN($arity = null, $class = null)
    {
        $func = static::curry2(function ($arity, $class) {
            return Phamda::curryN($arity, function (... $arguments) use ($class) {
                return new $class(...$arguments);
            });
        });

        return $func(...func_get_args());
    }

    /**
     * @param mixed $value
     * @param array $list
     *
     * @return callable|bool
     */
    public static function contains($value = null, array $list = null)
    {
        $func = static::curry2(function ($value, array $list) {
            return in_array($value, $list, true);
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param mixed    ...$initialArguments
     *
     * @return callable
     */
    public static function curry(callable $function = null, ... $initialArguments)
    {
        $func = static::curry1(function (callable $function, ... $initialArguments) {
            return Phamda::curryN(static::getArity($function), $function, ...$initialArguments);
        });

        return $func(...func_get_args());
    }

    /**
     * @param int      $count
     * @param callable $function
     * @param mixed    ...$initialArguments
     *
     * @return callable
     */
    public static function curryN($count = null, callable $function = null, ... $initialArguments)
    {
        $func = static::curry2(function ($count, callable $function, ... $initialArguments) {
            return $count - count($initialArguments) <= 0
                ? $function(...$initialArguments)
                : function (... $arguments) use ($count, $function, $initialArguments) {
                    $currentArguments = array_merge($initialArguments, $arguments);

                    return Phamda::curryN($count, function (... $arguments) use ($function) {
                        return $function(...$arguments);
                    }, ...$currentArguments);
                };
        });

        return $func(...func_get_args());
    }

    /**
     * @param int|float $number
     *
     * @return callable|int|float
     */
    public static function dec($number = null)
    {
        $func = static::curry1(function ($number) {
            return Phamda::add(-1, $number);
        });

        return $func(...func_get_args());
    }

    /**
     * @param mixed $default
     * @param mixed $value
     *
     * @return callable|mixed
     */
    public static function defaultTo($default = null, $value = null)
    {
        $func = static::curry2(function ($default, $value) {
            return $value !== null ? $value : $default;
        });

        return $func(...func_get_args());
    }

    /**
     * @param int|float $a
     * @param int|float $b
     *
     * @return callable|int|float
     */
    public static function divide($a = null, $b = null)
    {
        $func = static::curry2(function ($a, $b) {
            return $a / $b;
        });

        return $func(...func_get_args());
    }

    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @return callable|bool
     */
    public static function eq($a = null, $b = null)
    {
        $func = static::curry2(function ($a, $b) {
            return $a === $b;
        });

        return $func(...func_get_args());
    }

    /**
     * @return callable
     */
    public static function false()
    {
        return function () {
            return false;
        };
    }

    /**
     * @param callable $function
     * @param array    $list
     *
     * @return callable|array
     */
    public static function filter(callable $function = null, array $list = null)
    {
        $func = static::curry2(function (callable $function, array $list) {
            $result = [];
            foreach ($list as $key => $value) {
                if ($function($value, $key, $list)) {
                    $result[$key] = $value;
                }
            }

            return $result;
        });

        return $func(...func_get_args());
    }

    /**
     * @param array $list
     *
     * @return callable|mixed
     */
    public static function first(array $list = null)
    {
        $func = static::curry1(function (array $list) {
            return reset($list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     *
     * @return callable
     */
    public static function flip(callable $function = null)
    {
        $func = static::curry1(function (callable $function) {
            return function ($a, $b, ... $arguments) use ($function) {
                return $function($b, $a, ...$arguments);
            };
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param array    $list
     *
     * @return callable|array[]
     */
    public static function groupBy(callable $function = null, array $list = null)
    {
        $func = static::curry2(function (callable $function, array $list) {
            return Phamda::reduce(function (array $lists, $value) use ($function) {
                $lists[$function($value)][] = $value;

                return $lists;
            }, [], $list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @return callable|bool
     */
    public static function gt($a = null, $b = null)
    {
        $func = static::curry2(function ($a, $b) {
            return $a > $b;
        });

        return $func(...func_get_args());
    }

    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @return callable|bool
     */
    public static function gte($a = null, $b = null)
    {
        $func = static::curry2(function ($a, $b) {
            return $a >= $b;
        });

        return $func(...func_get_args());
    }

    /**
     * @param mixed $a
     *
     * @return callable|mixed
     */
    public static function identity($a = null)
    {
        $func = static::curry1(function ($a) {
            return $a;
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $condition
     * @param callable $onTrue
     * @param callable $onFalse
     *
     * @return callable|mixed
     */
    public static function ifElse(callable $condition = null, callable $onTrue = null, callable $onFalse = null)
    {
        $func = static::curry3(function (callable $condition, callable $onTrue, callable $onFalse) {
            return function (... $arguments) use ($condition, $onTrue, $onFalse) {
                return $condition(...$arguments) ? $onTrue(...$arguments) : $onFalse(...$arguments);
            };
        });

        return $func(...func_get_args());
    }

    /**
     * @param int|float $number
     *
     * @return callable|int|float
     */
    public static function inc($number = null)
    {
        $func = static::curry1(function ($number) {
            return Phamda::add(1, $number);
        });

        return $func(...func_get_args());
    }

    /**
     * @param mixed $value
     * @param array $list
     *
     * @return callable|int|string|false
     */
    public static function indexOf($value = null, array $list = null)
    {
        $func = static::curry2(function ($value, array $list) {
            foreach ($list as $key => $current) {
                if ($value === $current) {
                    return $key;
                }
            }

            return false;
        });

        return $func(...func_get_args());
    }

    /**
     * @param int    $arity
     * @param string $method
     * @param mixed  ...$initialArguments
     *
     * @return callable
     */
    public static function invoker($arity, $method, ... $initialArguments)
    {
        $remainingCount = $arity - count($initialArguments) + 1;

        return Phamda::curryN($remainingCount, function (... $arguments) use ($method, $initialArguments) {
            $object = array_pop($arguments);

            return $object->{$method}(...array_merge($initialArguments, $arguments));
        });
    }

    /**
     * @param array $list
     *
     * @return callable|bool
     */
    public static function isEmpty(array $list = null)
    {
        $func = static::curry1(function (array $list) {
            return empty($list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param string $class
     * @param object $object
     *
     * @return callable|bool
     */
    public static function isInstance($class = null, $object = null)
    {
        $func = static::curry2(function ($class, $object) {
            return $object instanceof $class;
        });

        return $func(...func_get_args());
    }

    /**
     * @param array $list
     *
     * @return callable|mixed
     */
    public static function last(array $list = null)
    {
        $func = static::curry1(function (array $list) {
            return end($list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @return callable|bool
     */
    public static function lt($a = null, $b = null)
    {
        $func = static::curry2(function ($a, $b) {
            return $a < $b;
        });

        return $func(...func_get_args());
    }

    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @return callable|bool
     */
    public static function lte($a = null, $b = null)
    {
        $func = static::curry2(function ($a, $b) {
            return $a <= $b;
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param array    $list
     *
     * @return callable|array
     */
    public static function map(callable $function = null, array $list = null)
    {
        $func = static::curry2(function (callable $function, array $list) {
            $result = [];
            foreach ($list as $key => $value) {
                $result[$key] = $function($value, $key, $list);
            }

            return $result;
        });

        return $func(...func_get_args());
    }

    /**
     * @param array $list
     *
     * @return callable|mixed
     */
    public static function max(array $list = null)
    {
        $func = static::curry1(function (array $list) {
            return static::getCompareResult(Phamda::gt(), $list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $getValue
     * @param array    $list
     *
     * @return callable|mixed
     */
    public static function maxBy(callable $getValue = null, array $list = null)
    {
        $func = static::curry2(function (callable $getValue, array $list) {
            return static::getCompareByResult(Phamda::gt(), $getValue, $list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param array $list
     *
     * @return callable|mixed
     */
    public static function min(array $list = null)
    {
        $func = static::curry1(function (array $list) {
            return static::getCompareResult(Phamda::lt(), $list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $getValue
     * @param array    $list
     *
     * @return callable|mixed
     */
    public static function minBy(callable $getValue = null, array $list = null)
    {
        $func = static::curry2(function (callable $getValue, array $list) {
            return static::getCompareByResult(Phamda::lt(), $getValue, $list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param int $a
     * @param int $b
     *
     * @return callable|int
     */
    public static function modulo($a = null, $b = null)
    {
        $func = static::curry2(function ($a, $b) {
            return $a % $b;
        });

        return $func(...func_get_args());
    }

    /**
     * @param int|float $a
     * @param int|float $b
     *
     * @return callable|int|float
     */
    public static function multiply($a = null, $b = null)
    {
        $func = static::curry2(function ($a, $b) {
            return $a * $b;
        });

        return $func(...func_get_args());
    }

    /**
     * @param int|float $a
     *
     * @return callable|int|float
     */
    public static function negate($a = null)
    {
        $func = static::curry1(function ($a) {
            return Phamda::multiply($a, -1);
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param array    $list
     *
     * @return callable|bool
     */
    public static function none(callable $function = null, array $list = null)
    {
        $func = static::curry2(function (callable $function, array $list) {
            return ! Phamda::any($function, $list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     *
     * @return callable
     */
    public static function not(callable $function = null)
    {
        $func = static::curry1(function (callable $function) {
            return function (... $arguments) use ($function) {
                return ! $function(...$arguments);
            };
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $a
     * @param callable $b
     *
     * @return callable
     */
    public static function or_(callable $a = null, callable $b = null)
    {
        $func = static::curry2(function (callable $a, callable $b) {
            return function (... $arguments) use ($a, $b) {
                return $a(...$arguments) || $b(...$arguments);
            };
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param mixed    ...$initialArguments
     *
     * @return callable
     */
    public static function partial(callable $function, ... $initialArguments)
    {
        return Phamda::partialN(static::getArity($function), $function, ...$initialArguments);
    }

    /**
     * @param int      $arity
     * @param callable $function
     * @param mixed    ...$initialArguments
     *
     * @return callable
     */
    public static function partialN($arity, callable $function, ... $initialArguments)
    {
        $partial        = function (... $arguments) use ($function, $initialArguments) {
            return $function(...array_merge($initialArguments, $arguments));
        };
        $remainingCount = $arity - count($initialArguments);

        return $remainingCount > 0 ? Phamda::curryN($remainingCount, $partial) : $partial;
    }

    /**
     * @param callable $predicate
     * @param array    $list
     *
     * @return callable|array[]
     */
    public static function partition(callable $predicate = null, array $list = null)
    {
        $func = static::curry2(function (callable $predicate, array $list) {
            return Phamda::reduce(function (array $lists, $value) use ($predicate) {
                $lists[$predicate($value) ? 0 : 1][] = $value;

                return $lists;
            }, [[], []], $list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param string       $path
     * @param array|object $object
     *
     * @return callable|mixed
     */
    public static function path($path = null, $object = null)
    {
        $func = static::curry2(function ($path, $object) {
            return Phamda::pathOn('.', $path, $object);
        });

        return $func(...func_get_args());
    }

    /**
     * @param string       $separator
     * @param string       $path
     * @param array|object $object
     *
     * @return callable|mixed
     */
    public static function pathOn($separator = null, $path = null, $object = null)
    {
        $func = static::curry3(function ($separator, $path, $object) {
            foreach (explode($separator, $path) as $name) {
                $object = Phamda::prop($name, $object);
            }

            return $object;
        });

        return $func(...func_get_args());
    }

    /**
     * @param array $names
     * @param array $item
     *
     * @return callable|array
     */
    public static function pick(array $names = null, array $item = null)
    {
        $func = static::curry2(function (array $names, array $item) {
            $new = [];
            foreach ($names as $name) {
                if (array_key_exists($name, $item)) {
                    $new[$name] = $item[$name];
                }
            }

            return $new;
        });

        return $func(...func_get_args());
    }

    /**
     * @param array $names
     * @param array $item
     *
     * @return callable|array
     */
    public static function pickAll(array $names = null, array $item = null)
    {
        $func = static::curry2(function (array $names, array $item) {
            $new = [];
            foreach ($names as $name) {
                $new[$name] = isset($item[$name]) ? $item[$name] : null;
            }

            return $new;
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable ...$functions
     *
     * @return callable
     */
    public static function pipe(... $functions)
    {
        if (count($functions) < 2) {
            throw new \LogicException('Pipe requires at least two argument functions.');
        }

        return function (... $arguments) use ($functions) {
            $result = null;
            foreach ($functions as $function) {
                $result = $result !== null ? $function($result) : $function(...$arguments);
            }

            return $result;
        };
    }

    /**
     * @param string $name
     * @param array  $list
     *
     * @return callable|mixed
     */
    public static function pluck($name = null, array $list = null)
    {
        $func = static::curry2(function ($name, array $list) {
            return Phamda::map(Phamda::prop($name), $list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param int[]|float[] $values
     *
     * @return callable|int|float
     */
    public static function product(array $values = null)
    {
        $func = static::curry1(function (array $values) {
            return Phamda::reduce(Phamda::multiply(), 1, $values);
        });

        return $func(...func_get_args());
    }

    /**
     * @param string       $name
     * @param array|object $object
     *
     * @return callable|mixed
     */
    public static function prop($name = null, $object = null)
    {
        $func = static::curry2(function ($name, $object) {
            return is_object($object) ? $object->{$name} : $object[$name];
        });

        return $func(...func_get_args());
    }

    /**
     * @param string       $name
     * @param mixed        $value
     * @param array|object $object
     *
     * @return callable|bool
     */
    public static function propEq($name = null, $value = null, $object = null)
    {
        $func = static::curry3(function ($name, $value, $object) {
            return is_object($object) ? $object->{$name} === $value : $object[$name] === $value;
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param mixed    $initial
     * @param array    $list
     *
     * @return callable|mixed
     */
    public static function reduce(callable $function = null, $initial = null, array $list = null)
    {
        $func = static::curry3(function (callable $function, $initial, array $list) {
            foreach ($list as $key => $value) {
                $initial = $function($initial, $value, $key, $list);
            }

            return $initial;
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param mixed    $initial
     * @param array    $list
     *
     * @return callable|mixed
     */
    public static function reduceRight(callable $function = null, $initial = null, array $list = null)
    {
        $func = static::curry3(function (callable $function, $initial, array $list) {
            return Phamda::reduce($function, $initial, array_reverse($list));
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param array    $list
     *
     * @return callable|array
     */
    public static function reject(callable $function = null, array $list = null)
    {
        $func = static::curry2(function (callable $function, array $list) {
            return Phamda::filter(Phamda::not($function), $list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param array $list
     *
     * @return callable|array
     */
    public static function reverse(array $list = null)
    {
        $func = static::curry1(function (array $list) {
            return array_reverse($list);
        });

        return $func(...func_get_args());
    }

    /**
     * @param int   $start
     * @param int   $end
     * @param array $list
     *
     * @return callable|array
     */
    public static function slice($start = null, $end = null, array $list = null)
    {
        $func = static::curry3(function ($start, $end, array $list) {
            return array_slice($list, $start, $end - $start);
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $comparator
     * @param array    $list
     *
     * @return callable|array
     */
    public static function sort(callable $comparator = null, array $list = null)
    {
        $func = static::curry2(function (callable $comparator, array $list) {
            usort($list, $comparator);

            return $list;
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param array    $list
     *
     * @return callable|array
     */
    public static function sortBy(callable $function = null, array $list = null)
    {
        $func = static::curry2(function (callable $function, array $list) {
            $comparator = function ($a, $b) use ($function) {
                $aKey = $function($a);
                $bKey = $function($b);

                return $aKey < $bKey ? -1 : ($aKey > $bKey ? 1 : 0);
            };
            usort($list, $comparator);

            return $list;
        });

        return $func(...func_get_args());
    }

    /**
     * @param int|float $a
     * @param int|float $b
     *
     * @return callable|int|float
     */
    public static function subtract($a = null, $b = null)
    {
        $func = static::curry2(function ($a, $b) {
            return $a - $b;
        });

        return $func(...func_get_args());
    }

    /**
     * @param int[]|float[] $values
     *
     * @return callable|int|float
     */
    public static function sum(array $values = null)
    {
        $func = static::curry1(function (array $values) {
            return Phamda::reduce(Phamda::add(), 0, $values);
        });

        return $func(...func_get_args());
    }

    /**
     * @return callable
     */
    public static function true()
    {
        return function () {
            return true;
        };
    }

    /**
     * @param array        $specification
     * @param array|object $object
     *
     * @return callable|mixed
     */
    public static function where(array $specification = null, $object = null)
    {
        $func = static::curry2(function (array $specification, $object) {
            foreach ($specification as $name => $part) {
                if (! static::testSpecificationPart($name, $part, $object)) {
                    return false;
                }
            }

            return true;
        });

        return $func(...func_get_args());
    }

    /**
     * @param array $a
     * @param array $b
     *
     * @return callable|array
     */
    public static function zip(array $a = null, array $b = null)
    {
        $func = static::curry2(function (array $a, array $b) {
            $zipped = [];
            foreach (array_intersect_key($a, $b) as $key => $value) {
                $zipped[$key] = [$value, $b[$key]];
            }

            return $zipped;
        });

        return $func(...func_get_args());
    }

    /**
     * @param callable $function
     * @param array    $a
     * @param array    $b
     *
     * @return callable|array
     */
    public static function zipWith(callable $function = null, array $a = null, array $b = null)
    {
        $func = static::curry3(function (callable $function, array $a, array $b) {
            $zipped = [];
            foreach (array_intersect_key($a, $b) as $key => $value) {
                $zipped[$key] = $function($value, $b[$key]);
            }

            return $zipped;
        });

        return $func(...func_get_args());
    }
}
