# Instructions

In this exercise you need to implement some functions to manipulate a list of programming languages.

## 1. Define a function to return an empty language list

Define the `language_list` function that takes no arguments and returns an empty list.

```php
<?php

language_list();
// => []
```

## 2. Modify function to create a list from any number of languages

Modify the `language_list` function, so it takes a variadic argument or string languages.
It should return the resulting list with the languages in the list.

```php
<?php

$language_list = language_list();
// => []
$language_list = language_list("Clojure", "PHP");
// => ["Clojure", "PHP"]
$language_list = language_list("PHP", "Haskell", "Java", "C++", "Rust")
// => ["PHP", "Haskell", "Java", "C++", "Rust"]
```

## 3. Define a function to add a language to the list

Define the `add_to_language_list` function that takes 2 arguments, an array of languages, and the new language.

```php
<?php

$language_list = language_list();
// => []
$language_list = add_to_language_list($language_list, "Clojure");
// => ["Clojure"]
```

## 4. Define a function to remove an item from the language list

Define the `prune_language_list` function to remove the first language from the array of languages.

```php
<?php

$language_list = language_list("PHP");
// => ["PHP"]
$language_list = prune_language_list($language_list);
// => []
```

## 5. Define a function to get the first item in the list

Define the `current_language` function that takes 1 argument (a _language list_).
It should return the first language in the list.
Assume the list will always have at least one item.

```php
<?php

$language_list = language_list("PHP", "Prolog");
// => ["PHP", "Prolog"]
$first = current_language($language_list);
// => "PHP"
```

## 6. Define a function to return how many languages are in the list

Define the `language_list_length` function that takes 1 argument (a _language list_).
It should return the number of languages in the list.

```php
<?php

$language_list = $language_list("PHP", "Prolog", "Wren");
// => ["PHP", "Prolog", "Wren"]
language_list_length($language_list);
// => 2
```
