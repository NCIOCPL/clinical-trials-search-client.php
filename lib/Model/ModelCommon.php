<?php

namespace NCIOCPL\ClinicalTrialSearch\Model;

use ArrayAccess;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ObjectSerializer;

/**
 * Common functionality for all models.
 *
 * @package NCIOCPL\ClinicalTrialSearch
 */
class ModelCommon implements ArrayAccess {

  /**
   * Associative array for storing property values.
   *
   * @var mixed[]
   */
  protected $container = [];

  /**
   * Check whether all model properties are valid.
   *
   * @return bool
   *   True if all properties are valid
   */
  public function valid() {
    return count($this->listInvalidProperties()) === 0;
  }

  /**
   * Returns true if offset exists. False otherwise.
   *
   * @param int $offset
   *   Offset.
   *
   * @return bool
   *   Reflects whether the offset exists.
   */
  public function offsetExists($offset) {
    return isset($this->container[$offset]);
  }

  /**
   * Gets offset.
   *
   * @param int $offset
   *   Offset.
   *
   * @return mixed
   *   The value stored at $offset.
   */
  public function offsetGet($offset) {
    return isset($this->container[$offset]) ? $this->container[$offset] : NULL;
  }

  /**
   * Sets value based on offset.
   *
   * @param int $offset
   *   Offset.
   * @param mixed $value
   *   Value to be set.
   */
  public function offsetSet($offset, $value) {
    if (is_null($offset)) {
      $this->container[] = $value;
    }
    else {
      $this->container[$offset] = $value;
    }
  }

  /**
   * Unsets offset.
   *
   * @param int $offset
   *   Offset.
   */
  public function offsetUnset($offset) {
    unset($this->container[$offset]);
  }

  /**
   * Magic method to provide get/set functionality.
   *
   * Models require multiple trivial get/set methods, varying only in the name
   * of the value being set or retrieved. This method encapsulates that
   * functionality in a single place.  This is a PHP "Magic" function.
   *
   * @param string $name
   *   String containing the name of the method which was invoked. Expected to
   *   start with either "get" or "set" concatenated with the name of the
   *   property being retrieved or set.
   * @param array $arguments
   *   An array of the arguments passed to the get or set method.
   */
  public function __call(string $name, array $arguments) {

    $operation = substr($name, 0, 3);
    $field = substr($name, 3);

    if ($operation === 'get') {
      return $this->container[$field];
    }
    elseif ($operation === 'set') {
      $this->container[$field] = $arguments[0];
    }
    else {
      throw new ApiException("Unknown method '${name}'.", 0);
    }
  }

  /**
   * PHP "magic" method to provide Property getter functionality.
   *
   * @param string $name
   *   The name of the property to retrieve.
   */
  public function __get($name) {
    return $this->container[$name];
  }

  /**
   * PHP "magic" method to provide Property setter functionality.
   *
   * @param string $name
   *   The name of the property to set.
   * @param mixed $value
   *   The property's new value.
   */
  public function __set($name, $value) {
    $this->container[$name] = $value;
  }

  /**
   * Gets the string presentation of the object.
   *
   * @return string
   *   JSON representation of the object.
   */
  public function __toString() {

    // Use JSON pretty print.
    if (defined('JSON_PRETTY_PRINT')) {
      return json_encode(
        ObjectSerializer::sanitizeForSerialization($this),
        JSON_PRETTY_PRINT
      );
    }

    return json_encode(ObjectSerializer::sanitizeForSerialization($this));
  }

}
