<?php
class Lab2Test extends PHPUnit_Framework_TestCase
{
    //驗證是否為同一個物件（相同）
    public function test_Object_Equals_by_Assert_Equals()
    {
        $expected = new stdclass();
        $expected->id = '1';
        $expected->price = 10;

        $actual = $expected;
        $actual->id = '1';
        $actual->price = 10;

        $this->assertSame($expected, $actual);

    }

    //驗證兩個物件是否相等（相等）
    public function test_Object_Equals_with_ExpectedObjects()
    {
        $expected = new stdclass();
        $expected->id = '1';
        $expected->price = 10;

        $actual = new stdclass();
        $actual->id = '1';
        $actual->price = 10;

        $this->assertEquals($expected, $actual);

    }

    public function test_PersonCollection_Equals_with_ExpectedObjects()
    {

        $expected =
        [
            new Person(1, 'A', 10),
            new Person(2, 'B', 20),
            new Person(3, 'C', 30),
        ];


        $actual =
        [
            new Person(1, 'A', 10),
            new Person(2, 'B', 20),
            new Person(3, 'C', 30),
        ];

        $this->assertEquals($expected, $actual);
    }

    public function test_ComposedPerson_Equals_with_ExpectedObjects()
    {

        $expected = new Person(1, "A", 10);
        $expected->order = new Order(91, 910);

        $actual = new Person(1, "A", 10);
        $actual->order = new Order(91, 910);

        $this->assertEquals($expected, $actual);

    }

    public function test_PartialCompare_Person_Equals_with_ExpectedObjects()
    {
        $expected = new Person(1, "A", 10);
        $expected->order = new Order(91, 910);

        $actual = new Person(1, "A", 10);
        $actual->sex = 'male';
        $actual->order = new Order(91, 910);
        $actual->order->tax = 50;

        //目前找不到方法看object是否包含某些property
        $this->assertContains($expected, $actual);

    }
}

class Person
{
    public function __construct($id, $name, $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }
}

class Order
{
    public function __construct($id, $price)
    {
        $this->id = $id;
        $this->price = $price;
    }
}


