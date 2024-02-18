<?php

trait ReflectionAssertions
{
    private function assertProperty(
        string $class_name,
        string $property_name,
        array $assertions = []
    ) {
        $reflector = new ReflectionClass($class_name);
        $assertions = $this->getAssertionDefaults($assertions);

        try {
            $property = $reflector->getProperty($property_name);
        } catch (ReflectionException) {
            $this->fail(
                "Property '$property_name' missing from class '{$class_name}'"
            );
        };

        $this->assertType($property, $assertions);
        $this->assertDefault($property, $assertions);
    }

    private function assertMethodParameter(
        string $class_name,
        string $method_name,
        string $parameter_name,
        int $parameter_index,
        array $assertions = []
    ): void {
        $reflector = new ReflectionClass($class_name);
        $assertions = $this->getAssertionDefaults($assertions);

        try {
            $method = $reflector->getMethod($method_name);
        } catch (ReflectionException) {
            $this->fail(
                "Method '$method_name' missing from class '$class_name'"
            );
        };

        $parameter = $method->getParameters()[$parameter_index] ?? null;

        if (is_null($parameter)) {
            $this->fail(
                "Method '$parameter_name' missing parameter $parameter_index"
                . " named '$parameter_name'"
            );
        }

        if ($parameter->getName() !== $parameter_name) {
            $this->fail(
                "Method '$method_name' parameter $parameter_index expected to be"
                . " named '$parameter_name', got '{$parameter->getName()}'"
            );
        }

        $this->assertType($parameter, $assertions);
        $this->assertDefault($parameter, $assertions);
    }

    private function assertMethodReturnType(
        string $class_name,
        string $method_name,
        array $assertions
    ): void {
        $reflector = new ReflectionClass($class_name);
        $assertions = $this->getAssertionDefaults($assertions);

        try {
            $method = $reflector->getMethod($method_name);
        } catch (ReflectionException) {
            $this->fail(
                "Method '$method_name' missing from class '$class_name'"
            );
        };

        if ($assertions['has_type']) {
            $this->assertTrue(
                $method->hasReturnType(),
                "$class_name::$method_name should have a return type declared"
            );
            $method_return_type = $method->getReturnType();
            $this->assertEquals(
                $assertions['type_name'],
                $method_return_type->getName(),
                "$class_name::$method_name should have a return type declared"
                . " as '{$assertions['type_name']}', got"
                . " '{$method_return_type->getName()}'"
            );
            $this->assertEquals(
                $assertions['type_allows_null'],
                $method->getReturnType()->allowsNull(),
                $assertions['type_allows_null']
                    ? "$class_name::$method_name should have a nullable return type declared"
                    : "$class_name::$method_name should have a non-nullable return type declared"
            );
        } else {
            $this->assertFalse($method->hasReturnType());
            $this->assertNull($method->getReturnType());
        }
    }

    private function getAssertionDefaults(array $assertions): array
    {
        return array_merge([
            'has_type' => false,
            'has_default_value' => false,
        ], $assertions);
    }

    private function assertType(
        ReflectionProperty|ReflectionParameter $reflector,
        array $assertions
    ): void {
        $reflector_type_name = $this->getReflectionTypeName($reflector);
        $name = $reflector->getName();

        if ($assertions['has_type']) {
            $this->assertTrue(
                $reflector->hasType(),
                "$reflector_type_name '$name' should have a type declared"
            );
            $reflected_type = $reflector->getType();
            $this->assertEquals(
                $assertions['type_name'],
                $reflected_type->getName(),
                "$reflector_type_name '$name' should be declared as a"
                . " '{$assertions['type_name']}', got"
                . " '{$reflected_type->getName()}'"
            );
            $this->assertEquals(
                $assertions['type_allows_null'],
                $reflected_type->allowsNull(),
                "$reflector_type_name '$name' should not be declared to allow null"
            );
        } else {
            $this->assertFalse(
                $reflector->hasType(),
                "$reflector_type_name '$name' should not have a type declared"
            );
        }
    }

    private function assertDefault(
        ReflectionProperty|ReflectionParameter $reflector,
        array $assertions
    ): void {
        $reflector_type_name = $this->getReflectionTypeName($reflector);
        $has_default_value_method = $reflector_type_name === 'Property'
            ? 'hasDefaultValue'
            : 'isDefaultValueAvailable';
        $name = $reflector->getName();

        if ($assertions['has_default_value']) {
            $this->assertTrue(
                $reflector->$has_default_value_method()
            );
            $this->assertEquals(
                $assertions['default_value'],
                $reflector->getDefaultValue(),
                "$reflector_type_name '$name' should have a default value"
                . " declared as '{$assertions['default_value']}', got"
                . " '{$reflector->getDefaultValue()}'"
            );
        } else {
            if ($assertions['has_type'] === false) {
                $this->assertTrue($reflector->hasDefaultValue());
                $this->assertNull($reflector->getDefaultValue());
            } else {
                $this->assertFalse(
                    $reflector->$has_default_value_method(),
                    "$reflector_type_name '$name' should not have a default value declared"
                );
            }
        }
    }

    private function getReflectionTypeName(
        ReflectionParameter | ReflectionProperty $reflector
    ): string {
        return preg_replace('/^Reflection/', '', get_class($reflector));
    }
}
