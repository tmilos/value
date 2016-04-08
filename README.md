# Value object PHP lib

Abstract value and enum objects

## Value objects

```php
class IntValue extends AbstractValue
{
    public static function isValid($value)
    {
        return is_int($value);
    }
}

$x = new IntValue(10); // ok
print $x->getValue(); // 10
$y = new IntValue(10);
var_dump($x->equal($y)); // true

$z = new IntValue('20'); // throws \UnexpectedValueException
```

## Enum value object

All class defined constants are valid values, and magic method with same constant name can be called to instantiate Enum with that value.

```php
class Gender extends AbstractEnum
{
    const MALE = 'male';
    const FEMALE = 'female';

    private static $titles = [
        self::MALE => 'gender.male',
        self::FEMALE => 'gender.female',
    ];

    public function getTitle()
    {
        return self::$titles[$this->getValue()];
    }
}

var_dump(Gender::all());    // ['male' => Gender() => 'female' => Gender() ]
var_dump(Gender::values()); // [ 0 => 'male', 1 => 'female' ]
$m = Gender::MALE();
print $m->getValue(); // male
print $m->getTitle(); // female
var_dump(Gender::isValid('male')); // true
var_dump(Gender::isValid('something')); // false
```
