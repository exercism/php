# Design

## Goal

This exercise teaches students how to use comparison operators and `if` control structures to branch logic based on numeric ranges.

## Learning objectives

- Know how to compare values using comparison operators (`==`, `===`, `<`, `>`, `<=`, `>=`).
- Know the difference between equal (`==`) and identical (`===`) comparisons.
- Know how to conditionally execute code using `if` statements.
- Know how to chain conditions with `elseif` / multiple `if` statements.
- Know how to convert a floating-point number to an integer by truncation.

## Out of scope

- `switch` / `match` expressions.
- The ternary operator.
- Type declarations.
- `declare(strict_types=1)`.

## Concepts

- `comparison-operators`: know how to compare values; know the difference between equal and identical comparisons.
- `if-control-structures`: know how to conditionally execute code using `if` / `elseif` / `else`.

## Prerequisites

- `booleans`: know how to use boolean values and operators.
- `integers`: know how to work with whole numbers.
- `floating-point-numbers`: know how to work with floating-point numbers.
- `arithmetic-operators`: know how to multiply and divide numbers.

## Analyzer

This exercise could benefit from the following rules:

- `actionable`: If the student did not reuse `successRate` inside `productionRatePerHour`, instruct them to do so.
- `informative`: If the solution repeatedly hard-codes `221`, suggest storing it in a constant.
- `informative`: If the solution uses `if`/`elseif` with early returns, note that trailing `else` branches may be redundant.
