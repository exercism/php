# Instructions

You have been working in the city office for a while, and you have developed a set of tools that speed up your day-to-day work, for example with filling out forms.

Now, a new colleague is joining you, and you realized your tools might not be self-explanatory. There are a lot of weird conventions in your office, like always filling out forms with uppercase letters and avoiding leaving fields empty.

You decide to write some documentation so that it's easier for your new colleague to hop right in and start using your tools.

## 1. Document the types for the Address class

Add property types to each of the `Address` class properties declared.
Each class property should be declared as a string.

## 2. Document the types to fill out the form with blank values

Add a parameter type and a return type to the `blanks` method in the `Form` class.
The method should take in an integer length, and return a string representation of the blank line.

## 3. Document the type when splitting a value into separate letters

Add a parameter type and a return type to the `letters` method in the `Form` class.
The method should take in a string, representing words, and return an array of letters.

## 4. Document the type when checking if a value will fit into a form

Add parameter types and a return type to the `checkLength` method in the `Form` class.
The method should take in a string word, and an integer maximum length, and return a true or false value.

## 5. Document the type when formatting an address in the form

Add a parameter type, making use of the `Address` class updated previously, and a return type to the `formatAddress` method in the `Form` class.
The method should take in an `Address` and return a formatted string.
