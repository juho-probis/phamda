# Phamda functions

Currently included functions (80):

* [add](#add)
* [all](#all)
* [allPass](#allPass)
* [always](#always)
* [any](#any)
* [anyPass](#anyPass)
* [assoc](#assoc)
* [assocPath](#assocPath)
* [both](#both)
* [clone_](#clone_)
* [comparator](#comparator)
* [compose](#compose)
* [construct](#construct)
* [constructN](#constructN)
* [contains](#contains)
* [curry](#curry)
* [curryN](#curryN)
* [dec](#dec)
* [defaultTo](#defaultTo)
* [divide](#divide)
* [either](#either)
* [eq](#eq)
* [false](#false)
* [filter](#filter)
* [find](#find)
* [findIndex](#findIndex)
* [findLast](#findLast)
* [findLastIndex](#findLastIndex)
* [first](#first)
* [flip](#flip)
* [groupBy](#groupBy)
* [gt](#gt)
* [gte](#gte)
* [identity](#identity)
* [ifElse](#ifElse)
* [inc](#inc)
* [indexOf](#indexOf)
* [invoker](#invoker)
* [isEmpty](#isEmpty)
* [isInstance](#isInstance)
* [last](#last)
* [lt](#lt)
* [lte](#lte)
* [map](#map)
* [max](#max)
* [maxBy](#maxBy)
* [min](#min)
* [minBy](#minBy)
* [modulo](#modulo)
* [multiply](#multiply)
* [negate](#negate)
* [none](#none)
* [not](#not)
* [partial](#partial)
* [partialN](#partialN)
* [partition](#partition)
* [path](#path)
* [pathEq](#pathEq)
* [pick](#pick)
* [pickAll](#pickAll)
* [pipe](#pipe)
* [pluck](#pluck)
* [product](#product)
* [prop](#prop)
* [propEq](#propEq)
* [reduce](#reduce)
* [reduceRight](#reduceRight)
* [reject](#reject)
* [reverse](#reverse)
* [slice](#slice)
* [sort](#sort)
* [sortBy](#sortBy)
* [subtract](#subtract)
* [sum](#sum)
* [tap](#tap)
* [times](#times)
* [true](#true)
* [where](#where)
* [zip](#zip)
* [zipWith](#zipWith)


<a name="add"></a>
### add
`Phamda::add($x, $y)`

Adds two numbers.
##### Examples
```php
Phamda::add(15, 27); // => 42
Phamda::add(36, -8); // => 28
```


<a name="all"></a>
### all
`Phamda::all(callable $predicate, $collection)`

Returns `true` if all elements of the collection match the predicate, `false` otherwise.
##### Examples
```php
$isPositive = function ($x) {
    return $x > 0;
};
Phamda::all($isPositive, [1, 2, 0, -5]); // => false
Phamda::all($isPositive, [1, 2, 1, 11]); // => true
```


<a name="allPass"></a>
### allPass
`Phamda::allPass(array $predicates)`

Creates a single predicate from a list of predicates that returns `true` when all the predicates match, `false` otherwise.
##### Examples
```php
$isEven = function ($x) {
    return $x % 2 === 0;
};
$isPositive = function ($x) {
    return $x > 0;
};
$isEvenAndPositive = Phamda::allPass([$isEven, $isPositive]);
$isEvenAndPositive(5); // => false
$isEvenAndPositive(-4); // => false
$isEvenAndPositive(6); // => true
```


<a name="always"></a>
### always
`Phamda::always($value)`

Returns a function that always returns the passed value.
##### Examples
```php
$alwaysFoo = Phamda::always('foo');
$alwaysFoo(); // => 'foo'
```


<a name="any"></a>
### any
`Phamda::any(callable $predicate, $collection)`

Returns `true` if any element of the collection matches the predicate, `false` otherwise.
##### Examples
```php
$isPositive = function ($x) {
    return $x > 0;
};
Phamda::any($isPositive, [1, 2, 0, -5]); // => true
Phamda::any($isPositive, [-3, -7, -1, -5]); // => false
```


<a name="anyPass"></a>
### anyPass
`Phamda::anyPass(array $predicates)`

Creates a single predicate from a list of predicates that returns `true` when any of the predicates matches, `false` otherwise.
##### Examples
```php
$isEven = function ($x) {
    return $x % 2 === 0;
};
$isPositive = function ($x) {
    return $x > 0;
};
$isEvenOrPositive = Phamda::anyPass([$isEven, $isPositive]);
$isEvenOrPositive(5); // => true
$isEvenOrPositive(-4); // => true
$isEvenOrPositive(-3); // => false
```


<a name="assoc"></a>
### assoc
`Phamda::assoc($property, $value, $object)`

Returns a new array or object, setting the given value to the specified property.
##### Examples
```php
Phamda::assoc('bar', 3, ['foo' => 1]); // => ['foo' => 1, 'bar' => 3]
Phamda::assoc('bar', 3, ['foo' => 1, 'bar' => 2]); // => ['foo' => 1, 'bar' => 3]
Phamda::assoc('foo', null, ['foo' => 15, 'bar' => 7]); // => ['foo' => null, 'bar' => 7]
```


<a name="assocPath"></a>
### assocPath
`Phamda::assocPath(array $path, $value, $object)`

Returns a new array or object, setting the given value to the property specified by the path.
##### Examples
```php
Phamda::assocPath(['bar'], 3, ['foo' => 1, 'bar' => 2]); // => ['foo' => 1, 'bar' => 3]
Phamda::assocPath(['bar', 'baz'], 4, ['foo' => 1, 'bar' => []]); // => ['foo' => 1, 'bar' => ['baz' => 4]]
```


<a name="both"></a>
### both
`Phamda::both(callable $a, callable $b)`

Returns a function that returns `true` when both of the predicates match, `false` otherwise.
##### Examples
```php
$lt = function ($x, $y) {
    return $x < $y;
};
$arePositive = function ($x, $y) {
    return $x > 0 && $y > 0;
};
$test = Phamda::both($lt, $arePositive);
$test(9, 4); // => false
$test(-3, 11); // => false
$test(5, 17); // => true
```


<a name="clone_"></a>
### clone_
`Phamda::clone_($object)`

Clones an object.
##### Examples



<a name="comparator"></a>
### comparator
`Phamda::comparator(callable $predicate)`

Creates a comparator function from a function that returns whether the first argument is less than the second.
##### Examples
```php
$lt = function ($x, $y) {
    return $x < $y;
};
$compare = Phamda::comparator($lt);
$compare(5, 6); // => -1
$compare(6, 5); // => 1
$compare(5, 5); // => 0
```


<a name="compose"></a>
### compose
`Phamda::compose(... $functions)`

Returns a new function that calls each supplied function in turn in reverse order and passes the result as a parameter to the next function.
##### Examples
```php
$add5 = function ($x) {
    return $x + 5;
};
$square = function ($x) {
    return $x ** 2;
};
$addToSquared = Phamda::compose($add5, $square);
$addToSquared(4); // => 21
$hello = function ($target) {
    return 'Hello ' . $target;
};
$helloUpper = Phamda::compose($hello, 'strtoupper');
$upperHello = Phamda::compose('strtoupper', $hello);
$helloUpper('world'); // => 'Hello WORLD'
$upperHello('world'); // => 'HELLO WORLD'
```


<a name="construct"></a>
### construct
`Phamda::construct($class, ... $initialArguments)`

Wraps the constructor of the given class to a function.
##### Examples
```php
$date = Phamda::construct(\DateTime::class, '2015-03-15');
$date->format('Y-m-d'); // => '2015-03-15'
```


<a name="constructN"></a>
### constructN
`Phamda::constructN($arity, $class, ... $initialArguments)`

Wraps the constructor of the given class to a function of specified arity.
##### Examples
```php
$construct = Phamda::constructN(1, \DateTime::class);
$construct('2015-03-15')->format('Y-m-d'); // => '2015-03-15'
```


<a name="contains"></a>
### contains
`Phamda::contains($value, $collection)`

Returns `true` if the specified item is found in the collection, `false` otherwise.
##### Examples
```php
Phamda::contains('a', ['a', 'b', 'c', 'e']); // => true
Phamda::contains('d', ['a', 'b', 'c', 'e']); // => false
```


<a name="curry"></a>
### curry
`Phamda::curry(callable $function, ... $initialArguments)`

Wraps the given function to a function that returns a new function until all required parameters are given.
##### Examples
```php
$add = function ($x, $y, $z) {
    return $x + $y + $z;
};
$addHundred = Phamda::curry($add, 100);
$addHundred(20, 3); // => 123
```


<a name="curryN"></a>
### curryN
`Phamda::curryN($length, callable $function, ... $initialArguments)`

Wraps the given function to a function of specified arity that returns a new function until all required parameters are given.
##### Examples
```php
$add = function ($x, $y, $z = 0) {
    return $x + $y + $z;
};
$addTen = Phamda::curryN(3, $add, 10);
$addTen(10, 3); // => 23
$addTwenty = $addTen(10);
$addTwenty(5); // => 25
```


<a name="dec"></a>
### dec
`Phamda::dec($number)`

Decrements the given number.
##### Examples
```php
Phamda::dec(43); // => 42
Phamda::dec(-14); // => -15
```


<a name="defaultTo"></a>
### defaultTo
`Phamda::defaultTo($default, $value)`

Returns the default argument if the value argument is `null`.
##### Examples
```php
Phamda::defaultTo(22, 15); // => 15
Phamda::defaultTo(42, null); // => 42
Phamda::defaultTo(15, false); // => false
```


<a name="divide"></a>
### divide
`Phamda::divide($x, $y)`

Divides two numbers.
##### Examples
```php
Phamda::divide(55, 11); // => 5
Phamda::divide(48, -8); // => -6
```


<a name="either"></a>
### either
`Phamda::either(callable $a, callable $b)`

Returns a function that returns `true` when either of the predicates matches, `false` otherwise.
##### Examples
```php
$lt = function ($x, $y) {
    return $x < $y;
};
$arePositive = function ($x, $y) {
    return $x > 0 && $y > 0;
};
$test = Phamda::either($lt, $arePositive);
$test(-5, -16); // => false
$test(-3, 11); // => true
$test(17, 3); // => true
```


<a name="eq"></a>
### eq
`Phamda::eq($x, $y)`

Return true when the arguments are strictly equal.
##### Examples
```php
Phamda::eq('a', 'a'); // => true
Phamda::eq('a', 'b'); // => false
Phamda::eq(null, null); // => true
```


<a name="false"></a>
### false
`Phamda::false()`

Returns a function that always returns `false`.
##### Examples
```php
$false = Phamda::false();
$false(); // => false
```


<a name="filter"></a>
### filter
`Phamda::filter(callable $predicate, $collection)`

Returns a new collection containing the items that match the given predicate.
##### Examples
```php
$gt2 = function ($x) {
    return $x > 2;
};
Phamda::filter($gt2, ['foo' => 2, 'bar' => 3, 'baz' => 4]); // => ['bar' => 3, 'baz' => 4]
```


<a name="find"></a>
### find
`Phamda::find(callable $predicate, $collection)`

Returns the first item of a collection for which the given predicate matches, or null if no match is found.
##### Examples
```php
$isPositive = function ($x) {
    return $x > 0;
};
Phamda::find($isPositive, [-5, 0, 15, 33, -2]); // => 15
```


<a name="findIndex"></a>
### findIndex
`Phamda::findIndex(callable $predicate, $collection)`

Returns the index of the first item of a collection for which the given predicate matches, or null if no match is found.
##### Examples
```php
$isPositive = function ($x) {
    return $x > 0;
};
Phamda::findIndex($isPositive, [-5, 0, 15, 33, -2]); // => 2
```


<a name="findLast"></a>
### findLast
`Phamda::findLast(callable $predicate, $collection)`

Returns the last item of a collection for which the given predicate matches, or null if no match is found.
##### Examples
```php
$isPositive = function ($x) {
    return $x > 0;
};
Phamda::findLast($isPositive, [-5, 0, 15, 33, -2]); // => 33
```


<a name="findLastIndex"></a>
### findLastIndex
`Phamda::findLastIndex(callable $predicate, $collection)`

Returns the index of the last item of a collection for which the given predicate matches, or null if no match is found.
##### Examples
```php
$isPositive = function ($x) {
    return $x > 0;
};
Phamda::findLastIndex($isPositive, [-5, 0, 15, 33, -2]); // => 3
```


<a name="first"></a>
### first
`Phamda::first($collection)`

Returns the first item of a collection, or false if the collection is empty.
##### Examples
```php
Phamda::first([5, 8, 9, 13]); // => 5
Phamda::first([]); // => false
```


<a name="flip"></a>
### flip
`Phamda::flip(callable $function)`

Wraps the given function and returns a new function for which the order of the first two parameters is reversed.
##### Examples
```php
$sub = function ($x, $y) {
    return $x - $y;
};
$flippedSub = Phamda::flip($sub);
$flippedSub(20, 30); // => 10
```


<a name="groupBy"></a>
### groupBy
`Phamda::groupBy(callable $function, $collection)`

Returns an array of sub collections based on a function that returns the group keys for each item.
##### Examples
```php
$firstChar = function ($string) {
    return $string[0];
};
$collection = ['abc', 'cbc', 'cab', 'baa', 'ayb'];
Phamda::groupBy($firstChar, $collection); // => ['a' => ['abc', 'ayb'], 'c' => ['cbc', 'cab'], 'b' => ['baa']]
```


<a name="gt"></a>
### gt
`Phamda::gt($x, $y)`

Returns `true` if the first parameter is greater than the second, `false` otherwise.
##### Examples
```php
Phamda::gt(1, 2); // => false
Phamda::gt(1, 1); // => false
Phamda::gt(2, 1); // => true
```


<a name="gte"></a>
### gte
`Phamda::gte($x, $y)`

Returns `true` if the first parameter is greater than or equal to the second, `false` otherwise.
##### Examples
```php
Phamda::gte(1, 2); // => false
Phamda::gte(1, 1); // => true
Phamda::gte(2, 1); // => true
```


<a name="identity"></a>
### identity
`Phamda::identity($x)`

Returns the given parameter.
##### Examples
```php
Phamda::identity(1); // => 1
Phamda::identity(null); // => null
Phamda::identity('abc'); // => 'abc'
```


<a name="ifElse"></a>
### ifElse
`Phamda::ifElse(callable $condition, callable $onTrue, callable $onFalse)`

Returns a function that applies either the `onTrue` or the `onFalse` function, depending on the result of the `condition` predicate.
##### Examples
```php
$addOrSub = Phamda::ifElse(Phamda::lt(0), Phamda::add(-10), Phamda::add(10));
$addOrSub(25); // => 15
$addOrSub(-3); // => 7
```


<a name="inc"></a>
### inc
`Phamda::inc($number)`

Increments the given number.
##### Examples
```php
Phamda::inc(41); // => 42
Phamda::inc(-16); // => -15
```


<a name="indexOf"></a>
### indexOf
`Phamda::indexOf($item, $collection)`

Returns the index of the given item in a collection, or `false` if the item is not found.
##### Examples
```php
Phamda::indexOf(16, [1, 6, 44, 16, 52]); // => 3
Phamda::indexOf(15, [1, 6, 44, 16, 52]); // => false
```


<a name="invoker"></a>
### invoker
`Phamda::invoker($arity, $method, ... $initialArguments)`

Returns a function that calls the specified method of a given object.
##### Examples
```php
$addDay = Phamda::invoker(1, 'add', new \DateInterval('P1D'));
$addDay(new \DateTime('2015-03-15'))->format('Y-m-d'); // => '2015-03-16'
$addDay(new \DateTime('2015-03-12'))->format('Y-m-d'); // => '2015-03-13'
```


<a name="isEmpty"></a>
### isEmpty
`Phamda::isEmpty($collection)`

Returns `true` if a collection has no elements, `false` otherwise.
##### Examples
```php
Phamda::isEmpty([1, 2, 3]); // => false
Phamda::isEmpty([0]); // => false
Phamda::isEmpty([]); // => true
```


<a name="isInstance"></a>
### isInstance
`Phamda::isInstance($class, $object)`

Return `true` if an object is of the specified class, `false` otherwise.
##### Examples
```php
$isDate = Phamda::isInstance(\DateTime::class);
$isDate(new \DateTime()); // => true
$isDate(new \DateTimeImmutable()); // => false
```


<a name="last"></a>
### last
`Phamda::last($collection)`

Returns the last item of a collection, or false if the collection is empty.
##### Examples
```php
Phamda::last([5, 8, 9, 13]); // => 13
Phamda::last([]); // => false
```


<a name="lt"></a>
### lt
`Phamda::lt($x, $y)`

Returns `true` if the first parameter is less than the second, `false` otherwise.
##### Examples
```php
Phamda::lt(1, 2); // => true
Phamda::lt(1, 1); // => false
Phamda::lt(2, 1); // => false
```


<a name="lte"></a>
### lte
`Phamda::lte($x, $y)`

Returns `true` if the first parameter is less than or equal to the second, `false` otherwise.
##### Examples
```php
Phamda::lte(1, 2); // => true
Phamda::lte(1, 1); // => true
Phamda::lte(2, 1); // => false
```


<a name="map"></a>
### map
`Phamda::map(callable $function, $collection)`

Returns a new collection where values are created from the original collection by calling the supplied function.
##### Examples
```php
$square = function ($x) {
    return $x ** 2;
};
Phamda::map($square, [1, 2, 3, 4]); // => [1, 4, 9, 16]
```


<a name="max"></a>
### max
`Phamda::max($collection)`

Returns the largest value in the collection.
##### Examples
```php
Phamda::max([6, 15, 8, 9, -2, -3]); // => 15
Phamda::max(['bar', 'foo', 'baz']); // => 'foo'
```


<a name="maxBy"></a>
### maxBy
`Phamda::maxBy(callable $getValue, $collection)`

Returns the item from a collection for which the supplied function returns the largest value.
##### Examples
```php
$getFoo = function ($item) {
    return $item->foo;
};
$a = (object) ['baz' => 3, 'bar' => 16, 'foo' => 5];
$b = (object) ['baz' => 1, 'bar' => 25, 'foo' => 8];
$c = (object) ['baz' => 14, 'bar' => 20, 'foo' => -2];
Phamda::maxBy($getFoo, [$a, $b, $c]); // => $b
```


<a name="min"></a>
### min
`Phamda::min($collection)`

Returns the smallest value in the collection.
##### Examples
```php
Phamda::min([6, 15, 8, 9, -2, -3]); // => -3
Phamda::min(['bar', 'foo', 'baz']); // => 'bar'
```


<a name="minBy"></a>
### minBy
`Phamda::minBy(callable $getValue, $collection)`

Returns the item from a collection for which the supplied function returns the smallest value.
##### Examples
```php
$getFoo = function ($item) {
    return $item->foo;
};
$a = (object) ['baz' => 3, 'bar' => 16, 'foo' => 5];
$b = (object) ['baz' => 1, 'bar' => 25, 'foo' => 8];
$c = (object) ['baz' => 14, 'bar' => 20, 'foo' => -2];
Phamda::minBy($getFoo, [$a, $b, $c]); // => $c
```


<a name="modulo"></a>
### modulo
`Phamda::modulo($x, $y)`

Divides two integers and returns the modulo.
##### Examples
```php
Phamda::modulo(15, 6); // => 3
Phamda::modulo(22, 11); // => 0
Phamda::modulo(-23, 6); // => -5
```


<a name="multiply"></a>
### multiply
`Phamda::multiply($x, $y)`

Multiplies two numbers.
##### Examples
```php
Phamda::multiply(15, 27); // => 405
Phamda::multiply(36, -8); // => -288
```


<a name="negate"></a>
### negate
`Phamda::negate($x)`

Returns the negation of a number.
##### Examples
```php
Phamda::negate(15); // => -15
Phamda::negate(-0.7); // => 0.7
Phamda::negate(0); // => 0
```


<a name="none"></a>
### none
`Phamda::none(callable $predicate, $collection)`

Returns `true` if no element in the collection matches the predicate, `false` otherwise.
##### Examples
```php
$isPositive = function ($x) {
    return $x > 0;
};
Phamda::none($isPositive, [1, 2, 0, -5]); // => false
Phamda::none($isPositive, [-3, -7, -1, -5]); // => true
```


<a name="not"></a>
### not
`Phamda::not(callable $predicate)`

Wraps a predicate and returns a function that return `true` if the wrapped function returns a falsey value, `false` otherwise.
##### Examples
```php
$equal = function ($a, $b) {
    return $a === $b;
};
$notEqual = Phamda::not($equal);
$notEqual(15, 13); // => true
$notEqual(7, 7); // => false
```


<a name="partial"></a>
### partial
`Phamda::partial(callable $function, ... $initialArguments)`

Wraps the given function and returns a new function that can be called with the remaining parameters.
##### Examples
```php
$add = function ($x, $y, $z) {
    return $x + $y + $z;
};
$addTen = Phamda::partial($add, 10);
$addTen(3, 4); // => 17
$addTwenty = Phamda::partial($add, 2, 3, 15);
$addTwenty(); // => 20
```


<a name="partialN"></a>
### partialN
`Phamda::partialN($arity, callable $function, ... $initialArguments)`

Wraps the given function and returns a new function of fixed arity that can be called with the remaining parameters.
##### Examples
```php
$add = function ($x, $y, $z = 0) {
    return $x + $y + $z;
};
$addTen = Phamda::partialN(3, $add, 10);
$addTwenty = $addTen(10);
$addTwenty(5); // => 25
```


<a name="partition"></a>
### partition
`Phamda::partition(callable $predicate, $collection)`

Returns the items of the original collection divided into two collections based on a predicate function.
##### Examples
```php
$isPositive = function ($x) {
    return $x > 0;
};
Phamda::partition($isPositive, [4, -16, 7, -3, 2, 88]); // => [[4, 7, 2, 88], [-16, -3]]
```


<a name="path"></a>
### path
`Phamda::path(array $path, $object)`

Returns a value found at the given path.
##### Examples
```php
Phamda::path(['foo', 'bar'], ['foo' => ['baz' => 26, 'bar' => 15]]); // => 15
Phamda::path(['bar', 'baz'], ['bar' => ['baz' => null, 'foo' => 15]]); // => null
```


<a name="pathEq"></a>
### pathEq
`Phamda::pathEq(array $path, $value, $object)`

Returns `true` if the given value is found at the specified path, `false` otherwise.
##### Examples
```php
Phamda::pathEq(['foo', 'bar'], 44, ['foo' => ['baz' => 26, 'bar' => 15]]); // => false
Phamda::pathEq(['foo', 'baz'], 26, ['foo' => ['baz' => 26, 'bar' => 15]]); // => true
```


<a name="pick"></a>
### pick
`Phamda::pick(array $names, array $item)`

Returns a new array, containing only the values that have keys matching the given list.
##### Examples
```php
Phamda::pick(['bar', 'fib'], ['foo' => null, 'bar' => 'bzz', 'baz' => 'bob']); // => ['bar' => 'bzz']
Phamda::pick(['fob', 'fib'], ['foo' => null, 'bar' => 'bzz', 'baz' => 'bob']); // => []
Phamda::pick(['bar', 'foo'], ['foo' => null, 'bar' => 'bzz', 'baz' => 'bob']); // => ['bar' => 'bzz', 'foo' => null]
```


<a name="pickAll"></a>
### pickAll
`Phamda::pickAll(array $names, array $item)`

Returns a new array, containing the values that have keys matching the given list, including keys that are not found in the item.
##### Examples
```php
Phamda::pickAll(['bar', 'fib'], ['foo' => null, 'bar' => 'bzz', 'baz' => 'bob']); // => ['bar' => 'bzz', 'fib' => null]
Phamda::pickAll(['fob', 'fib'], ['foo' => null, 'bar' => 'bzz', 'baz' => 'bob']); // => ['fob' => null, 'fib' => null]
Phamda::pickAll(['bar', 'foo'], ['foo' => null, 'bar' => 'bzz', 'baz' => 'bob']); // => ['bar' => 'bzz', 'foo' => null]
```


<a name="pipe"></a>
### pipe
`Phamda::pipe(... $functions)`

Returns a new function that calls each supplied function in turn and passes the result as a parameter to the next function.
##### Examples
```php
$add5 = function ($x) {
    return $x + 5;
};
$square = function ($x) {
    return $x ** 2;
};
$squareAdded = Phamda::pipe($add5, $square);
$squareAdded(4); // => 81
$hello = function ($target) {
    return 'Hello ' . $target;
};
$helloUpper = Phamda::pipe('strtoupper', $hello);
$upperHello = Phamda::pipe($hello, 'strtoupper');
$helloUpper('world'); // => 'Hello WORLD'
$upperHello('world'); // => 'HELLO WORLD'
```


<a name="pluck"></a>
### pluck
`Phamda::pluck($name, $collection)`

Returns a new collection, where the items are single properties plucked from the given collection.
##### Examples
```php
Phamda::pluck('foo', [['foo' => null, 'bar' => 'bzz', 'baz' => 'bob'], ['foo' => 'fii', 'baz' => 'pob']]); // => [null, 'fii']
Phamda::pluck('baz', [['foo' => null, 'bar' => 'bzz', 'baz' => 'bob'], ['foo' => 'fii', 'baz' => 'pob']]); // => ['bob', 'pob']
```


<a name="product"></a>
### product
`Phamda::product($values)`

Multiplies a list of numbers.
##### Examples
```php
Phamda::product([11, -8, 3]); // => -264
Phamda::product([1, 2, 3, 4, 5, 6]); // => 720
```


<a name="prop"></a>
### prop
`Phamda::prop($name, $object)`

Returns the given element of an array or property of an object.
##### Examples
```php
Phamda::prop('bar', ['bar' => 'fuz', 'baz' => null]); // => 'fuz'
Phamda::prop('baz', ['bar' => 'fuz', 'baz' => null]); // => null
```


<a name="propEq"></a>
### propEq
`Phamda::propEq($name, $value, $object)`

Returns `true` if the specified property has the given value, `false` otherwise.
##### Examples
```php
Phamda::propEq('foo', 'bar', ['foo' => 'bar']); // => true
Phamda::propEq('foo', 'baz', ['foo' => 'bar']); // => false
```


<a name="reduce"></a>
### reduce
`Phamda::reduce(callable $function, $initial, $collection)`

Returns a value accumulated by calling the given function for each element of the collection.
##### Examples
```php
$concat = function ($x, $y) {
    return $x . $y;
};
Phamda::reduce($concat, 'foo', ['bar', 'baz']); // => 'foobarbaz'
```


<a name="reduceRight"></a>
### reduceRight
`Phamda::reduceRight(callable $function, $initial, $collection)`

Returns a value accumulated by calling the given function for each element of the collection in reverse order.
##### Examples
```php
$concat = function ($x, $y) {
    return $x . $y;
};
Phamda::reduceRight($concat, 'foo', ['bar', 'baz']); // => 'foobazbar'
```


<a name="reject"></a>
### reject
`Phamda::reject(callable $predicate, $collection)`

Returns a new collection containing the items that do not match the given predicate.
##### Examples
```php
$isEven = function ($x) {
    return $x % 2 === 0;
};
Phamda::reject($isEven, [1, 2, 3, 4]); // => [0 => 1, 2 => 3]
```


<a name="reverse"></a>
### reverse
`Phamda::reverse($collection)`

Returns a new collection where the items are in a reverse order.
##### Examples
```php
Phamda::reverse([3, 2, 1]); // => [1, 2, 3]
Phamda::reverse([22, 4, 16, 5]); // => [5, 16, 4, 22]
Phamda::reverse([]); // => []
```


<a name="slice"></a>
### slice
`Phamda::slice($start, $end, $collection)`

Returns a new collection, containing the items of the original from index `start` (inclusive) to index `end` (exclusive).
##### Examples
```php
Phamda::slice(2, 6, [1, 2, 3, 4, 5, 6, 7, 8, 9]); // => [3, 4, 5, 6]
Phamda::slice(0, 3, [1, 2, 3, 4, 5, 6, 7, 8, 9]); // => [1, 2, 3]
Phamda::slice(7, 11, [1, 2, 3, 4, 5, 6, 7, 8, 9]); // => [8, 9]
```


<a name="sort"></a>
### sort
`Phamda::sort(callable $comparator, $collection)`

Returns a new collection sorted by the given comparator function.
##### Examples
```php
$sub = function ($a, $b) {
    return $a - $b;
};
Phamda::sort($sub, [3, 2, 4, 1]); // => [1, 2, 3, 4]
```


<a name="sortBy"></a>
### sortBy
`Phamda::sortBy(callable $function, $collection)`

Returns a new collection sorted by comparing the values provided by calling the given function for each item.
##### Examples
```php
$getFoo = function ($a) {
    return $a['foo'];
};
$collection = [['foo' => 16, 'bar' => 3], ['foo' => 5, 'bar' => 42], ['foo' => 11, 'bar' => 7]];
Phamda::sortBy($getFoo, $collection); // => [['foo' => 5, 'bar' => 42], ['foo' => 11, 'bar' => 7], ['foo' => 16, 'bar' => 3]]
```


<a name="subtract"></a>
### subtract
`Phamda::subtract($x, $y)`

Subtracts two numbers.
##### Examples
```php
Phamda::subtract(15, 27); // => -12
Phamda::subtract(36, -8); // => 44
```


<a name="sum"></a>
### sum
`Phamda::sum($values)`

Adds together a list of numbers.
##### Examples
```php
Phamda::sum([1, 2, 3, 4, 5, 6]); // => 21
Phamda::sum([11, 0, 2, -4, 7]); // => 16
```


<a name="tap"></a>
### tap
`Phamda::tap(callable $function, $object)`

Calls the provided function with the given value as a parameter and returns the value.
##### Examples
```php
$addDay = function (\DateTime $date) {
    $date->add(new \DateInterval('P1D'));
};
$date = new \DateTime('2015-03-15');
Phamda::tap($addDay, $date); // => $date
$date->format('Y-m-d'); // => '2015-03-16'
```


<a name="times"></a>
### times
`Phamda::times(callable $function, $count)`

Calls the provided function the specified number of times and returns the results in an array.
##### Examples
```php
$double = function ($number) {
    return $number * 2;
};
Phamda::times($double, 5); // => [0, 2, 4, 6, 8]
```


<a name="true"></a>
### true
`Phamda::true()`

Returns a function that always returns `true`.
##### Examples
```php
$true = Phamda::true();
$true(); // => true
```


<a name="where"></a>
### where
`Phamda::where(array $specification, $object)`

Returns true if the given object matches the specification.
##### Examples
```php
Phamda::where(['a' => 15, 'b' => 16], ['a' => 15, 'b' => 42, 'c' => 88, 'd' => -10]); // => false
Phamda::where(['a' => 15, 'b' => 16], ['a' => 15, 'b' => 16, 'c' => -20, 'd' => 77]); // => true
```


<a name="zip"></a>
### zip
`Phamda::zip(array $a, array $b)`

Returns a new array of value pairs from the values of the given arrays with matching keys.
##### Examples
```php
Phamda::zip([1, 2, 3], [4, 5, 6]); // => [[1, 4], [2, 5], [3, 6]]
Phamda::zip(['a' => 1, 'b' => 2], ['a' => 3, 'c' => 4]); // => ['a' => [1, 3]]
Phamda::zip([1, 2, 3], []); // => []
```


<a name="zipWith"></a>
### zipWith
`Phamda::zipWith(callable $function, array $a, array $b)`

Returns a new array of values created by calling the given function with the matching values of the given arrays.
##### Examples
```php
$sum = function ($x, $y) {
    return $x + $y;
};
Phamda::zipWith($sum, [1, 2, 3], [5, 6]); // => [6, 8]
```