<?php

namespace NCIOCPL\ClinicalTrialSearch\Model;

use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Model\ModelInterface;

/**
 * Model for the CentralContactInformation objects.
 *
 * @package NCIOCPL\ClinicalTrialSearch
 */
class CentralContactInformation extends ModelCommon implements ModelInterface {

  const DISCRIMINATOR = NULL;

  /**
   * The original name of the model.
   *
   * @var string
   */
  protected static $swaggerModelName = 'CentralContactInformation';

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
    'Email' => 'string',
    'Name' => 'string',
    'Phone' => 'string',
    'Type' => 'string',
  ];

  /**
   * Mapping of property names to formatters.
   *
   * For now, always specify NULL.
   *
   * @var string[]
   */
  protected static $swaggerFormats = [
    'Email' => NULL,
    'Name' => NULL,
    'Phone' => NULL,
    'Type' => NULL,
  ];

  /**
   * Mapping of PHP property names to JSON property names.
   *
   * @var string[]
   */
  protected static $attributeMap = [
    'Email' => 'central_contact_email',
    'Name' => 'central_contact_name',
    'Phone' => 'central_contact_phone',
    'Type' => 'central_contact_type',
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
    'Email' => 'setEmail',
    'Name' => 'setName',
    'Phone' => 'setPhone',
    'Type' => 'setType',
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
    'Email' => 'getEmail',
    'Name' => 'getName',
    'Phone' => 'getPhone',
    'Type' => 'getType',
  ];

  /**
   * Constructor.
   *
   * @param mixed[] $data
   *   Associative array of property values for initializing the model
   *   from another instance.
   */
  public function __construct(array $data = NULL) {
    $this->container['Email'] = isset($data['Email']) ? $data['Email'] : NULL;
    $this->container['Name'] = isset($data['Name']) ? $data['Name'] : NULL;
    $this->container['Phone'] = isset($data['Phone']) ? $data['Phone'] : NULL;
    $this->container['Type'] = isset($data['Type']) ? $data['Type'] : NULL;
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
