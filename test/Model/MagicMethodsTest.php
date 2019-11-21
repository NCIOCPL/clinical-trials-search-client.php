<?php

namespace Test\Model;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the ModelCommon magic methods.
 */
class MagicMethodsTest extends TestCase {

  /**
   * Set Magic Property test.
   *
   * Verify that values set via properties can be
   * retrieved as properties, and via the getter method.
   */
  public function testSetProperty() {

    $stringValue = "turducken";
    $integerValue = -75;

    $model = new DummyModel();
    $model->StringProperty = $stringValue;
    $model->IntegerProperty = $integerValue;
    $this->assertSame($stringValue, $model->StringProperty, "string property.");
    $this->assertSame($stringValue, $model->getStringProperty(), "string getter.");
    $this->assertSame($integerValue, $model->IntegerProperty, "integer property.");
    $this->assertSame($integerValue, $model->getIntegerProperty(), "integer getter.");
  }

  /**
   * Magic Setter method test.
   *
   * Verify that values set via the setter methods can be
   * retrieved as properties, and via the getter method.
   */
  public function testSetMethod() {

    $stringValue = "turducken";
    $integerValue = -75;

    $model = new DummyModel();
    $model->setStringProperty($stringValue);
    $model->setIntegerProperty($integerValue);

    $this->assertSame($stringValue, $model->StringProperty, "string property.");
    $this->assertSame($stringValue, $model->getStringProperty(), "string getter.");
    $this->assertSame($integerValue, $model->IntegerProperty, "integer property.");
    $this->assertSame($integerValue, $model->getIntegerProperty(), "integer getter.");
  }

  /**
   * Test for getting unknown properties.
   *
   * Verify that attempting to retrieve a property value which was never set
   * returns a NULL instead of throwing an exception.
   */
  public function testUnknownProperty() {

    $model = new DummyModel();

    $this->assertNull($model->NoSuchProperty, "uknown property");
  }

}
