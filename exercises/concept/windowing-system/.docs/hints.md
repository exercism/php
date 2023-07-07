# Hints

## General

- Revisit the [Objects Concept][concept-class-basics] if needed to fresh up on the basics.

## 1. Define a ProgramWindow class

- Remember to use [class syntax][php-class] for this task.
- Define [properties][php-properties] by adding them to class declaration.

## 2. Define a constructor function for the ProgramWindow class

- Check that your constructor function does not accept any arguments.
- Check that each property is being set to the expected integer value.

## 3. Add a method to resize the window

- Remember to use a new [class][php-class] in the `Size.php` file for this task.
  - By convention, files usually only contain a single class.
- The `Size` constructor should accept arguments for the class [properties'][php-properties] initial values.
- Make a `resize` method of the `ProgramWindow` object to apply the change using an instance of `Size`.

## 4. Add a method to move the window

- Remember to use a new [class][php-class] in the `Position.php` file for this task.
  - By convention, files usually only contain a single class.
- The `Position` constructor should accept arguments for the class [properties'][php-properties] initial values.
- Make a `move` method of the `ProgramWindow` object to apply the change using an instance of `Position`.

[concept-class-basics]: /tracks/php/concepts/class-basics
[php-class]: https://www.php.net/manual/en/language.oop5.basic.php
[php-properties]: https://www.php.net/manual/en/language.oop5.properties.php
