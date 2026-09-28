# Design

## Goal

Teach students how to compare numbers with PHP comparison operators, using a small factory production story.

## Learning objectives

- Know how to compare numbers with `===`, `!==`, `<`, `>`, `<=`, and `>=`.
- Know how to use the spaceship operator `<=>`.
- Know that most comparison operators return a boolean, while `<=>` returns `-1`, `0`, or `1`.

## Out of scope

- Teaching `if` / `elseif` / `else` in depth (`if` is hand-waving only).
- `switch` / `match` / ternary.
- Type declarations and `declare(strict_types=1)`.
- Explicit type casting / type juggling (`(int)`, `intval()`, loose `==`).
- Class constants and `self::`.
- Object comparison.

## Concepts

- `comparison-operators`

## Prerequisites

- `booleans`
- `integers`
- `floating-point-numbers`

Arithmetic multiplication is assumed from earlier exercises.

## Tasks and operators practiced

1. `successRate($speed)`: `===`, `>=`, `>` (or equivalent range comparisons) with simple `if` hand-waving.
2. `productionRatePerHour($speed)`: reuse `successRate`; multiply with `221` (no casting).
3. `isLineRunning($speed)`: `!==`.
4. `compareSpeeds($left, $right)`: `<=>`.

## Analyzer

Possible future rules:

- `actionable`: suggest reusing `successRate` inside `productionRatePerHour`.
- `informative`: if `compareSpeeds` uses nested `if` instead of `<=>`, suggest the spaceship operator.
- `informative`: if `isLineRunning` wraps a comparison in unnecessary `if` / `return true/false`, suggest returning the comparison directly.
