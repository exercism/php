Commands to automate some contribution part of `exercism/php`.

They are all invokable with `php main.php <command> <arguments>`.

## `exercism:deprecated`

Lists upstream-deprecated exercises that are not track-deprecated yet.

Those exercises should be flagged with `"status": "deprecated"` in the PHP track.

## `exercism:test:bootstrap`

Bootstrap an `<ExerciseSlug>Test.php` file for argument `<exercise-slug>`.

Tests functions have to be implemented manually afterward.

## `exercism:test:generate`

Generate `<ExerciseSlug>Test.php` files from `<ExerciseSlug>Test.php.twig` files for argument `<exercise-slug>`.
