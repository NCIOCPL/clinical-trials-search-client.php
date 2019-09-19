<?php

namespace NCIOCPL\ClinicalTrialSearch\Model;

use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Model\ModelInterface;

/**
 * Model for the Phase objects.
 *
 * @package NCIOCPL\ClinicalTrialSearch
 */
class Phase extends ModelCommon implements ModelInterface {

  const DISCRIMINATOR = NULL;

  /**
   * The original name of the model.
   *
   * @var string
   */
  protected static $swaggerModelName = 'Phase';

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
    'PhaseNumber' => 'string',
    'PhaseOtherText' => 'string',
    'PhaseAdditionalQualifierCode' => 'string',
  ];

  /**
   * Mapping of property names to formatters.
   *
   * For now, always specify NULL.
   *
   * @var string[]
   */
  protected static $swaggerFormats = [
    'PhaseNumber' => NULL,
    'PhaseOtherText' => NULL,
    'PhaseAdditionalQualifierCode' => NULL,
  ];

  /**
   * Mapping of PHP property names to JSON property names.
   *
   * @var string[]
   */
  protected static $attributeMap = [
    'PhaseNumber' => 'phase',
    'PhaseOtherText' => 'phase_other_text',
    'PhaseAdditionalQualifierCode' => 'phase_additional_qualifier_code',
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
    'PhaseNumber' => 'setPhaseNumber',
    'PhaseOtherText' => 'setPhaseOtherText',
    'PhaseAdditionalQualifierCode' => 'setPhaseAdditionalQualifierCode',
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
    'PhaseNumber' => 'getPhaseNumber',
    'PhaseOtherText' => 'getPhaseOtherText',
    'PhaseAdditionalQualifierCode' => 'getPhaseAdditionalQualifierCode',
  ];

  /**
   * Constructor.
   *
   * @param mixed[] $data
   *   Associative array of property values for initializing the model
   *   from another instance.
   */
  public function __construct(array $data = NULL) {
    $this->container['PhaseNumber'] = isset($data['PhaseNumber']) ? $data['PhaseNumber'] : NULL;
    $this->container['PhaseOtherText'] = isset($data['PhaseOtherText']) ? $data['PhaseOtherText'] : NULL;
    $this->container['PhaseAdditionalQualifierCode'] = isset($data['PhaseAdditionalQualifierCode']) ? $data['PhaseAdditionalQualifierCode'] : NULL;
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
