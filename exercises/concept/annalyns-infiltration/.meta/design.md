# Design

## Learning objectives

- Know of the existence of the `boolean` type.
- Know about boolean operators and how to build logical expressions with them.
- Know of the boolean operator precedence rules.
- Know where it's documented, or at least how to search for it.

## Out of scope

- Binary operators

## Concepts

- `booleans`: Know of the existence of the `boolean` type.
  Know about boolean operators and how to build logical expressions with them.
  Know of the boolean operator precedence rules.
  Know where it's documented, or at least how to search for it.

## Prerequisites

- `basics`

## Analyzer

This exercise could benefit from the following rules added to the analyzer:

- Verify that the `canFastAttack` function is as simple as possible (single negation `!`).
- Verify that the `canSpy` function is as simple as possible (double OR `||`).
- Verify that the `canSignal` function is as simple as possible (single OR `||` and single negation `!`)
- Verify that the `canLiberate` function is not overly complex.
  Helper variables may be used, but those should result in a suggestion about combining them (informational, non-essential).

## Truth Tables

For tasks 2 - 4, the truth tables for the required tests read as such:

### Task 2: Can Spy
Test | Knight Awake | Archer Awake | Prisoner Awake | Can Spy
-- | -- | -- | -- | --
Everyone Asleep | FALSE | FALSE | FALSE | FALSE
Only Prisoner Awake | FALSE | FALSE | TRUE | TRUE
Only Archer Awake | FALSE | TRUE | FALSE | TRUE
Only Knight Awake | TRUE | FALSE | FALSE | TRUE
Only Prisoner Asleep | TRUE | TRUE | FALSE | TRUE
Only Archer Asleep | TRUE | FALSE | TRUE | TRUE
Only Knight Asleep | FALSE | TRUE | TRUE | TRUE
Everyone Awake | TRUE | TRUE | TRUE | TRUE

### Task 3: Can Signal
Test | Archer Awake | Prisoner Awake | Can Signal
-- | -- | -- | --
Everyone Asleep | FALSE | FALSE | FALSE
Only Prisoner Awake | FALSE | TRUE | TRUE
Only Archer Awake | TRUE | FALSE | FALSE
Everyone Awake | TRUE | TRUE | FALSE

### Task 4: Can Liberate
Test | Knight Awake | Archer Awake | Prisoner Awake | Dog Present | Can Liberate
-- | -- | -- | -- | -- | --
Everyone Asleep - Dog Present | FALSE | FALSE | FALSE | TRUE | TRUE
Only Prisoner Awake - Dog Present | FALSE | FALSE | TRUE | TRUE | TRUE
Only Archer Awake - Dog Present | FALSE | TRUE | FALSE | TRUE | FALSE
Only Knight Awake - Dog Present | TRUE | FALSE | FALSE | TRUE | TRUE
Only Prisoner Asleep - Dog Present | TRUE | TRUE | FALSE | TRUE | FALSE
Only Archer Asleep - Dog Present | TRUE | FALSE | TRUE | TRUE | TRUE
Only Knight Asleep - Dog Present | FALSE | TRUE | TRUE | TRUE | FALSE
Everyone Awake - Dog Present | TRUE | TRUE | TRUE | TRUE | FALSE
Everyone Asleep - No Dog | FALSE | FALSE | FALSE | FALSE | FALSE
Only Prisoner Awake - No Dog | FALSE | FALSE | TRUE | FALSE | TRUE
Only Archer Awake - No Dog | FALSE | TRUE | FALSE | FALSE | FALSE
Only Knight Awake - No Dog | TRUE | FALSE | FALSE | FALSE | FALSE
Only Prisoner Asleep - No Dog | TRUE | TRUE | FALSE | FALSE | FALSE
Only Archer Asleep - No Dog | TRUE | FALSE | TRUE | FALSE | FALSE
Only Knight Asleep - No Dog | FALSE | TRUE | TRUE | FALSE | FALSE
Everyone Awake - No Dog | TRUE | TRUE | TRUE | FALSE | FALSE

