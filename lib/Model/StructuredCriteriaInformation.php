<?php

namespace NCIOCPL\ClinicalTrialSearch\Model;

use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Model\ModelInterface;

/**
 * Model for the StructuredCriteriaInformation objects.
 *
 * @package NCIOCPL\ClinicalTrialSearch
 */
class StructuredCriteriaInformation extends ModelCommon implements ModelInterface {

  const DISCRIMINATOR = NULL;

  /**
   * The original name of the model.
   *
   * @var string
   */
  protected static $swaggerModelName = 'StructuredCriteriaInformation';

  /**
   * Mapping property names to their types.
   *
   * For scalar types, the valid values are boolean, integer, float, and string.
   * For an array, append '[]' (e.g. string[]).
   * For a nested model, use the fully resolved name.
   * e.g. \NCIOCPL\ClinicalTrialSearch\Model\Disease[]
   *
   * @var string[]
   */
  protected static $swaggerTypes = [
    'Gender' => 'string',
    'MaxAgeStr' => 'string',
    'MaxAgeInt' => 'integer',
    'MaxAgeUnits' => 'string',
    'MinAgeStr' => 'string',
    'MinAgeInt' => 'integer',
    'MinAgeUnits' => 'string',
  ];

  /**
   * Mapping of property names to formatters.
   *
   * For now, always specify NULL.
   *
   * @var string[]
   */
  protected static $swaggerFormats = [
    'Gender' => NULL,
    'MaxAgeStr' => NULL,
    'MaxAgeInt' => NULL,
    'MaxAgeUnits' => NULL,
    'MinAgeStr' => NULL,
    'MinAgeInt' => NULL,
    'MinAgeUnits' => NULL,
  ];

  /**
   * Mapping of PHP property names to JSON property names.
   *
   * @var string[]
   */
  protected static $attributeMap = [
    'Gender' => 'gender',
    'MaxAgeStr' => 'max_age',
    'MaxAgeInt' => 'max_age_number',
    'MaxAgeUnits' => 'max_age_unit',
    'MinAgeStr' => 'min_age',
    'MinAgeInt' => 'min_age_number',
    'MinAgeUnits' => 'min_age_unit',
  ];

  /**
   * Mapping of property names to their setter functions.
   *
   * The setter name is just the word 'set' followed by the name of the
   * property.  These names are cAsE seNsitive and correspond to the list
   * in the $getters array.
   *
   * @var string[]
   */
  protected static $setters = [
    'Gender' => 'setGender',
    'MaxAgeStr' => 'setMaxAgeStr',
    'MaxAgeInt' => 'setMaxAgeInt',
    'MaxAgeUnits' => 'setMaxAgeUnits',
    'MinAgeStr' => 'setMinAgeStr',
    'MinAgeInt' => 'setMinAgeInt',
    'MinAgeUnits' => 'setMinAgeUnits',
  ];

  /**
   * Mapping of property names to their getter functions.
   *
   * The setter name is just the word 'get' followed by the name of the
   * property.  These names are cAsE seNsitive and correspond to the list
   * in the $setters array.
   *
   * @var string[]
   */
  protected static $getters = [
    'Gender' => 'getGender',
    'MaxAgeStr' => 'getMaxAgeStr',
    'MaxAgeInt' => 'getMaxAgeInt',
    'MaxAgeUnits' => 'getMaxAgeUnits',
    'MinAgeStr' => 'getMinAgeStr',
    'MinAgeInt' => 'getMinAgeInt',
    'MinAgeUnits' => 'getMinAgeUnits',
  ];

  /**
   * Constructor.
   *
   * @param mixed[] $data
   *   Associative array of property values for initializing the model
   *   from another instance.
   */
  public function __construct(array $data = NULL) {
    $this->container['Gender'] = isset($data['Gender']) ? $data['Gender'] : NULL;
    $this->container['MaxAgeStr'] = isset($data['MaxAgeStr']) ? $data['MaxAgeStr'] : NULL;
    $this->container['MaxAgeInt'] = isset($data['MaxAgeInt']) ? $data['MaxAgeInt'] : NULL;
    $this->container['MaxAgeUnits'] = isset($data['MaxAgeUnits']) ? $data['MaxAgeUnits'] : NULL;
    $this->container['MinAgeStr'] = isset($data['MinAgeStr']) ? $data['MinAgeStr'] : NULL;
    $this->container['MinAgeInt'] = isset($data['MinAgeInt']) ? $data['MinAgeInt'] : NULL;
    $this->container['MinAgeUnits'] = isset($data['MinAgeUnits']) ? $data['MinAgeUnits'] : NULL;
  }

  /**
   * Create a list of validation messages.
   *
   * Performs validation for any properties needing validation.
   * (e.g. Is a required property present? Is the value within allowed ranges?)
   *
   * @return array
   *   An array of messages describing invalid properties.
   */
  public function listInvalidProperties() {

    $invalidProperties = [];

    /*
     * Any needed validation goes here. If a property requires no validation
     * (e.g. it's OK for it to be empty) then it may be omitted.
     */

    return $invalidProperties;
  }

  /**
   * Retrieves the list of property type mappings.
   *
   * @return array
   *   Associative array mapping attribute names to their types.
   */
  public static function swaggerTypes() {
    return self::$swaggerTypes;
  }

  /**
   * Retrieves the list format mappings.
   *
   * @return array
   *   Assciated array mapping attribute names to formatting objects.
   */
  public static function swaggerFormats() {
    return self::$swaggerFormats;
  }

  /**
   * Retrieve mapping of local names to JSON property names.
   *
   * @return array
   *   An Associative array, mapping attribute names to JSON property naames.
   */
  public static function attributeMap() {
    return self::$attributeMap;
  }

  /**
   * Array of attributes to setter functions (for deserialization of responses).
   *
   * @return array
   *   An Associative array, mapping attribute names to setter functions.
   */
  public static function setters() {
    return self::$setters;
  }

  /**
   * Array of attributes to getter functions (for serialization of requests).
   *
   * @return array
   *   An Associative array, mapping attribute names to getter functions.
   */
  public static function getters() {
    return self::$getters;
  }

  /**
   * The original name of the model.
   *
   * @return string
   *   The model's name.
   */
  public function getModelName() {
    return self::$swaggerModelName;
  }

}
