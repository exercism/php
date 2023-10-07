## PHP representations

The [PHP representer][github-php-representer] applies the following normalizations:

- All comments are removed
- All whitespaces are normalized
- Identifiers (classes, functions and variables) are normalized to a placeholder value
  - Identifiers that are case insensitive are normalized to the same placeholder value
  - Aliased functions are normalized (https://www.php.net/manual/en/aliases.php)
- Strings (single quoted, double quoted, heredoc and nowdoc) are all converted to single quoted (https://www.php.net/manual/en/language.types.string.php)
  - Encapsed strings are normalized to concatenation: `"this is $a variable"` => `'this is ' . $a . ' variable'`
  - Concatenation are simplified: `'testA' . 'testB' . 'testC'` => `'testAtestBtestC'`
- Arrays are normalized to short syntax: `array('a', 'b')` => `['a', 'b']`
- Casts `(float)` and `(real)` are normalized to `(double)`

[github-php-representer]: https://github.com/exercism/php-representer

### Before you submit

Please check the following things:

<!-- 1. You don't duplicate analyzer feedback -->
1. You check the "examples" tab in the submit dialog and see if the feedback makes sense for _all_ tabs.
2. You check that you have not referred to whitespace or comments
3. You check that you don't refer to function names, or variable names as they appear in the solution, but rather use the mapping provided (or leave names out).
   Only names required by the tests can safely be referered to because these are always the same for everyone.
