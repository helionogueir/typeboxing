# [Type Boxing](https://github.com/helionogueir/typeboxing)

Specific data types and tools for hitting type.

## Installation

Composer (https://getcomposer.org/) and (https://packagist.org/)
```sh
composer require helionogueir/typeboxing
```
------
## Usage

### helionogueir\typeBoxing\parse\ObjectToArray

Parse object to array
```php
use stdClass;
use helionogueir\typeBoxing\parse\ObjectToArray;
$Object = new stdClass();
$Object->d1 = new stdClass();
$Object->d1->d2 = null;
$array = (new ObjectToArray())->parse($Object);
```
------
## TDD (Test Driven Development)

PHPUnit (https://phpunit.de/)
```sh
phpunit -c ./typeboxing/tests/unit.xml
```

