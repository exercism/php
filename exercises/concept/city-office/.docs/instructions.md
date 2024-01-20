# Instructions

You have been working in the city office for a while, and you have developed a set of tools that speed up your day-to-day work, for example with filling out forms.

Now, a new colleague is joining you, and you realized your tools might not be self-explanatory.
There are a lot of weird conventions in your office, like always filling out forms with uppercase letters and avoiding leaving fields empty.

As a first step you decide to add PHP type declarations so that it is easier for your new colleague to hop right in and start using your tools.

## 1. Declare the types for the Address class

Add property type declarations to each of the `Address` class properties declared.
Each class property should be declared as a string.

## 2. Declare the types to fill out the form with blank values

Add a parameter type declaration and a return type declaration to the `blanks` method in the `Form` class.
The method should take in an integer length, and return a string representation of the blank line.

## 3. Declare the type when splitting a value into separate letters

Add a parameter type declaration and a return type declaration to the `letters` method in the `Form` class.
The method should take in a string, representing words, and return an array of letters.

## 4. Declare the type when checking if a value will fit into a form

Add parameter type declarations and a return type declaration to the `checkLength` method in the `Form` class.
The method should take in a string word, and an integer maximum length, and return a true or false value.

## 5. Declare the type when formatting an address in the form

Add a parameter type declaration, making use of the `Address` class updated previously, and a return type declaration to the `formatAddress` method in the `Form` class.
The method should take in an `Address` and return a formatted string.
