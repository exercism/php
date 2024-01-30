# Design

## Goal

The goal of this exercise is to introduce the student to the basic syntax of programming in PHP.
As this is the first exercise after `hello-world`, the exercise touches a lot of other concepts.
These concepts are only introduced, with no depths at all.
The student shall mostly understand what has been predefined using these other concepts and then get the exercise done.

## Learning objectives

- Recognize the PHP opening tag.
- Recognize the class definition.
- Recognize the predefined methods and their arguments.
- Recognize the hints in single-line comments.
- Recognize that functions can be defined in classes.
- Recognize that functions defined in classes are called methods.
- Recognize that classes are instantiated to use them.
- Know that instructions end with `;` always.
- Know what a variable is.
- Know how to use a variable.
- Know how to define the body of a multi-line function.
- Know that an argument passed to a function is accessed like a variable in the function.
- Know how to return a value from a function (explicit return, no implicit return possible).
- Know how to call a method.
- Know how to use `$this` in a method.
- Know how to define an integer value.
- Know how to define a string literal.
- Know how to use `-`, `+` and `*` on integers.

## Out of scope

- HTML or anything outside PHP tags.
- Where `;` may be omitted or is forbidden.
- Defining classes or methods by the student.
- Assigning values to variables.
- Other value types than integer and string.
- Other arithmetic operators than `-`, `+` and `*`.
- Type juggling, namely arithmetic operators `-`, `+` and `*` with strings.
- Naming rules for identifiers.
- Defining constants for magic numbers.
- Memory and performance characteristics.
- Type declarations.
- Strict types.
- Default arguments.
- Variable scopes.
- Class properties.
- Organizing code in namespaces.
- Writing comments.

## Concepts

The concepts this exercise unlocks are:

- `booleans`:
  - Know what a Boolean value is.
  - Know how to define a Boolean value.
  - Know how to use Boolean values in Boolean operations.
- `floating-point-numbers`:
  - Know what a Floating point number is.
  - Know how to define a Floating point number.
  - Know how to use Floating point numbers in comparisons.
  - Know how to use Floating point numbers in arithmetic operations.
- `integers`:
  - Know what an Integer is.
  - Know how to define an Integer.
  - Know how to use Integers in comparisons.
  - Know how to use Integers in arithmetic operations.
- `strings`:
  - Know what a String is.
  - Know how to define a String.
  - Know how to use String concatenation.

## Prerequisites

- Medium experienced programmers with no knowledge of PHP.
- Little experienced programmers are addressed on the concept page.
- Basic understanding of control flow (function calls), value types integer and string as well as how variables work.
- Understanding the feedback of unit tests.

## Analyzer

This exercise could benefit from the following rules added to a future analyzer:

- Rules to assert that functions are reused rather than recreated for overlapping use cases.
