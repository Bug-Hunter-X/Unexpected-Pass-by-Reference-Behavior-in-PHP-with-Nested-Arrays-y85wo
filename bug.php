```php
<?php
function increment_array(&$arr) {
  foreach ($arr as &$value) {
    $value++;
  }
}

$numbers = [1, 2, 3];
increment_array($numbers);
print_r($numbers); // Output: Array ( [0] => 2 [1] => 3 [2] => 4 )

//The problem arises when dealing with nested arrays or complex data structures.
$nested = [[1,2],[3,4]];
increment_array($nested);
print_r($nested); //Output Array ( [0] => 2 [1] => 4 )
// This doesn't increment the inner arrays elements.
```