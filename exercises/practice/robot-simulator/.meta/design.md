# Design

## Goal

This exercise trains object oriented programming in PHP.
The main aspect is data encapsulation.

A robot is inherently stateful.
This state shall be encapsulated as much as possible, but still must be accessible from the outside.
Make students think about the many ways PHP supports doing this.

## Learning objectives

- Recognize the possibility to use constructor promotion
- Recognize the getter method concept for data encapsulation
- Know what `public`, `protected` and `private` properties are
- Know how to implement getter methods, so internal data becomes
  - readonly to the outside
  - independent of interface contracts with the external world

## Out of scope

- Differences between `private` and `protected` properties

## Prerequisites

- We have no concept for OOP or data encapsulation, yet
- Basic understanding of OOP and data encapsulation
- Reading unit tests
- Classes, properties and methods in PHP

## Analyzer

This exercise could benefit from the following rules added to a future analyzer:

- To be defined
