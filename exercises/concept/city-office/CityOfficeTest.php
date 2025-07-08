<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

require_once 'ReflectionAssertions.php';
require_once 'Address.php';
require_once 'Form.php';

class CityOfficeTest extends TestCase
{
    use ReflectionAssertions;

    /**
     * @task_id 1
     */
    #[TestDox('specify a string type for Address::$street')]
    public function testTypeOfAddressStreetProperty()
    {
        $this->assertProperty(
            class_name: Address::class,
            property_name: 'street',
            assertions: [
                'has_type' => true,
                'type_name' => 'string',
                'type_allows_null' => false
            ]
        );
    }

    /**
     * @task_id 1
     */
    #[TestDox('specify a string type for Address::$postal_code')]
    public function testTypeOfAddressPostalCodeProperty()
    {
        $this->assertProperty(
            class_name: Address::class,
            property_name: 'postal_code',
            assertions: [
                'has_type' => true,
                'type_name' => 'string',
                'type_allows_null' => false
            ]
        );
    }

    /**
     * @task_id 1
     */
    #[TestDox('specify a string type for Address::$city')]
    public function testTypeOfAddressCityProperty()
    {
        $this->assertProperty(
            class_name: Address::class,
            property_name: 'city',
            assertions: [
                'has_type' => true,
                'type_name' => 'string',
                'type_allows_null' => false
            ]
        );
    }

    /**
     * @task_id 2
     */
    #[TestDox('specify an int type for Form::blanks length parameter')]
    public function testParameterTypeOfFormBlanksLengthParameter()
    {
        $this->assertMethodParameter(
            class_name: Form::class,
            method_name: 'blanks',
            parameter_name: 'length',
            parameter_index: 0,
            assertions: [
                'has_type' => true,
                'type_name' => 'int',
                'type_allows_null' => false,
                'has_default_value' => false
            ]
        );
    }

    /**
     * @task_id 2
     */
    #[TestDox('specify an int type for Form::blanks return type')]
    public function testParameterTypeOfFormBlanksReturnType()
    {
        $this->assertMethodReturnType(
            class_name: Form::class,
            method_name: 'blanks',
            assertions: [
                'has_type' => true,
                'type_name' => 'string',
                'type_allows_null' => false,
            ]
        );
    }

    /**
     * @task_id 3
     */
    #[TestDox('specify an int type for Form::letters word parameter')]
    public function testParameterTypeOfFormLettersWordParameter()
    {
        $this->assertMethodParameter(
            class_name: Form::class,
            method_name: 'letters',
            parameter_name: 'word',
            parameter_index: 0,
            assertions: [
                'has_type' => true,
                'type_name' => 'string',
                'type_allows_null' => false,
                'has_default_value' => false
            ]
        );
    }

    /**
     * @task_id 3
     */
    #[TestDox('specify an int type for Form::letters return type')]
    public function testParameterTypeOfFormLettersReturnType()
    {
        $this->assertMethodReturnType(
            class_name: Form::class,
            method_name: 'letters',
            assertions: [
                'has_type' => true,
                'type_name' => 'array',
                'type_allows_null' => false,
            ]
        );
    }

    /**
     * @task_id 4
     */
    #[TestDox('specify an int type for Form::checkLength word parameter')]
    public function testParameterTypeOfFormCheckLengthWordParameter()
    {
        $this->assertMethodParameter(
            class_name: Form::class,
            method_name: 'checkLength',
            parameter_name: 'word',
            parameter_index: 0,
            assertions: [
                'has_type' => true,
                'type_name' => 'string',
                'type_allows_null' => false,
                'has_default_value' => false
            ]
        );
    }

    /**
     * @task_id 4
     */
    #[TestDox('specify an int type for Form::checkLength max_length parameter')]
    public function testParameterTypeOfFormCheckLengthMaxLengthParameter()
    {
        $this->assertMethodParameter(
            class_name: Form::class,
            method_name: 'checkLength',
            parameter_name: 'max_length',
            parameter_index: 1,
            assertions: [
                'has_type' => true,
                'type_name' => 'int',
                'type_allows_null' => false,
                'has_default_value' => false
            ]
        );
    }

    /**
     * @task_id 4
     */
    #[TestDox('specify an int type for Form::checkLength return type')]
    public function testParameterTypeOfFormCheckLengthReturnType()
    {
        $this->assertMethodReturnType(
            class_name: Form::class,
            method_name: 'checkLength',
            assertions: [
                'has_type' => true,
                'type_name' => 'bool',
                'type_allows_null' => false,
            ]
        );
    }

    /**
     * @task_id 5
     */
    #[TestDox('specify an Address type for Form::formatAddress address parameter')]
    public function testParameterTypeOfFormFormatAddressParameter()
    {
        $this->assertMethodParameter(
            class_name: Form::class,
            method_name: 'formatAddress',
            parameter_name: 'address',
            parameter_index: 0,
            assertions: [
                'has_type' => true,
                'type_name' => 'Address',
                'type_allows_null' => false,
                'has_default_value' => false
            ]
        );
    }

    /**
     * @task_id 5
     */
    #[TestDox('specify an int type for Form::checkLength return type')]
    public function testParameterTypeOfFormFormatAddressReturnType()
    {
        $this->assertMethodReturnType(
            class_name: Form::class,
            method_name: 'formatAddress',
            assertions: [
                'has_type' => true,
                'type_name' => 'string',
                'type_allows_null' => false,
            ]
        );
    }
}
