```php
<?php
function increment_array_recursive(&$arr) {
  foreach ($arr as &$value) {
    if (is_array($value)) {
      increment_array_recursive($value);
    } else {
      $value++;
    }
  }
}

$nested = [[1, 2], [3, 4]];
increment_array_recursive($nested);
print_r($nested); // Output: Array ( [0] => Array ( [0] => 2 [1] => 3 ) [1] => Array ( [0] => 4 [1] => 5 ) )

//Alternatively, you can avoid pass-by-reference altogether and return a new array
function increment_array_return(array $arr): array {
  return array_map(function ($value) {
    return is_array($value) ? increment_array_return($value) : $value + 1;
  }, $arr);
}

$nested2 = [[1,2],[3,4]];
$incremented = increment_array_return($nested2);
print_r($incremented); // Output: Array ( [0] => Array ( [0] => 2 [1] => 3 ) [1] => Array ( [0] => 4 [1] => 5 ) )
```