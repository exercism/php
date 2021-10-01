# Introduction

`for` loops are the most complex type of loop in PHP. They behave like `for` loops in `C`, `Java`, and `JavaScript`. It's basic form is:

```php
for (expr1; expr2; expr3) {
  // statements
}
```

The first expression (_expr1_) is evaluated before the loop starts. The second expression (_expr2_) is evaluated before each iteration, if it evaluates to a _truthy_ value, the statements are executed. After the executed statements, the third expression (_expr3_) is evaluated.
