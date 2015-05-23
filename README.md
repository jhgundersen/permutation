Permutation
===========
Welcome to this little library for handling permutations in arrays.

Example
-------
To iterate through all possible combinations of values in an array use the ArrayPermuter

```php
$array = new ArrayPermuter([1,2,3]);
$array->walk(function($permutation){
	// do something
});
```