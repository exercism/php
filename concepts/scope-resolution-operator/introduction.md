# Scope Resolution Operator

The scope resolution operator (`::`) allows us to reference a class to access its name constants, static properties, or static methods.

```php
class MyClass
{
  public const MY_VALUE = 1;
}

// MyClass::class => "MyClass"
// MyClass::MY_VALUE => 1
```

## Using `self` and `static` with the Scope Resolution Operator

It may be required for an object to reference its own scope. To facilitate this, the `self` keyword allows a class to reference its own scope. Using the `self` keyword decouples the class from its own name -- making it easier to maintain code over time.

```php
class MyClass
{
  public const MY_VALUE = 1;

  public function getMyValue(): int
  {
    return self::MY_VALUE;
  }
}

// (new MyClass)->getMyValue() => 1
```

Use the `static` keyword with the scope resolution operator to "late bind" the reference to the current descendent class.

```php
// Update MyClass:
class MyClass
{
  public const MY_VALUE = 1;

  public function getMyValue(): int
  {
    return static::MY_VALUE;
  }
}
```

## Using `parent` with the Scope Resolution Operator

The `parent` keyword is used to reference parent class constant, properties or methods, Commonly it is used to call the call the parent constructor when an object is being instantiated:

```php
class ChildClass extends ParentClass
{
  public function __construct(): void
  {
    parent::__construct();
  }
}
```

## Caveats

### Constant, Property, and Method Visibility

The scope resolution operator still follows the rules set out by `public`, `private`, and `protected` visibility modifiers.
