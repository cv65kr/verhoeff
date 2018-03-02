# The Verhoeff Checksum Algorithm

PHP implementation of the Verhoeff algorithm based on [https://en.wikipedia.org/wiki/Verhoeff_algorithm](https://en.wikipedia.org/wiki/Verhoeff_algorithm).

## Example

```php
$test = new \Kajti\Verhoeff\Verhoeff('123c');

echo 'Validation';
var_dump($test->validate());

echo 'Correct number';
var_dump($test->getDigit());
```