<?php

namespace NCIOCPL\ClinicalTrialSearch\Model;

use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Model\ModelInterface;

/**
 * Model for the StudySite objects.
 *
 * @package NCIOCPL\ClinicalTrialSearch
 */
class StudySite extends ModelCommon implements ModelInterface {

  const DISCRIMINATOR = NULL;

  /**
   * The original name of the model.
   *
   * @var string
   */
  protected static $swaggerModelName = 'StudySite';

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
    'AddressLine1' => 'string',
    'AddressLine2' => 'string',
    'PostalCode' => 'string',
    'Coordinates' => '\NCIOCPL\ClinicalTrialSearch\Model\GeoLocation',
    'City' => 'string',
    'StateOrProvinceAbbreviation' => 'string',
    'Country' => 'string',
    'IsVA' => 'boolean',
    'Name' => 'string',
    'Family' => 'string',
    'OrgToFamilyRelationship' => 'string',
    'OrgEmail' => 'string',
    'OrgFax' => 'string',
    'OrgPhone' => 'string',
    'OrgTTY' => 'string',
    'ContactEmail' => 'string',
    'ContactName' => 'string',
    'ContactPhone' => 'string',
    'RecruitmentStatus' => 'string',
    'LocalSiteIdentifier' => 'string',
  ];

  /**
   * Mapping of property names to formatters.
   *
   * For now, always specify NULL.
   *
   * @var string[]
   */
  protected static $swaggerFormats = [
    'AddressLine1' => NULL,
    'AddressLine2' => NULL,
    'PostalCode' => NULL,
    'Coordinates' => NULL,
    'City' => NULL,
    'StateOrProvinceAbbreviation' => NULL,
    'Country' => NULL,
    'IsVA' => NULL,
    'Name' => NULL,
    'Family' => NULL,
    'OrgToFamilyRelationship' => NULL,
    'OrgEmail' => NULL,
    'OrgFax' => NULL,
    'OrgPhone' => NULL,
    'OrgTTY' => NULL,
    'ContactEmail' => NULL,
    'ContactName' => NULL,
    'ContactPhone' => NULL,
    'RecruitmentStatus' => NULL,
    'LocalSiteIdentifier' => NULL,
  ];

  /**
   * Mapping of PHP property names to JSON property names.
   *
   * @var string[]
   */
  protected static $attributeMap = [
    'AddressLine1' => 'org_address_line_1',
    'AddressLine2' => 'org_address_line_2',
    'PostalCode' => 'org_postal_code',
    'Coordinates' => 'org_coordinates',
    'City' => 'org_city',
    'StateOrProvinceAbbreviation' => 'org_state_or_province',
    'Country' => 'org_country',
    'IsVA' => 'org_va',
    'Name' => 'org_name',
    'Family' => 'org_family',
    'OrgToFamilyRelationship' => 'org_to_family_relationship',
    'OrgEmail' => 'org_email',
    'OrgFax' => 'org_fax',
    'OrgPhone' => 'org_phone',
    'OrgTTY' => 'org_tty',
    'ContactEmail' => 'contact_email',
    'ContactName' => 'contact_name',
    'ContactPhone' => 'contact_phone',
    'RecruitmentStatus' => 'recruitment_status',
    'LocalSiteIdentifier' => 'local_site_identifier',
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
    'AddressLine1' => 'setAddressLine1',
    'AddressLine2' => 'setAddressLine2',
    'PostalCode' => 'setPostalCode',
    'Coordinates' => 'setCoordinates',
    'City' => 'setCity',
    'StateOrProvinceAbbreviation' => 'setStateOrProvinceAbbreviation',
    'Country' => 'setCountry',
    'IsVA' => 'setIsVA',
    'Name' => 'setName',
    'Family' => 'setFamily',
    'OrgToFamilyRelationship' => 'setOrgToFamilyRelationship',
    'OrgEmail' => 'setOrgEmail',
    'OrgFax' => 'setOrgFax',
    'OrgPhone' => 'setOrgPhone',
    'OrgTTY' => 'setOrgTTY',
    'ContactEmail' => 'setContactEmail',
    'ContactName' => 'setContactName',
    'ContactPhone' => 'setContactPhone',
    'RecruitmentStatus' => 'setRecruitmentStatus',
    'LocalSiteIdentifier' => 'setLocalSiteIdentifier',
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
    'AddressLine1' => 'getAddressLine1',
    'AddressLine2' => 'getAddressLine2',
    'PostalCode' => 'getPostalCode',
    'Coordinates' => 'getCoordinates',
    'City' => 'getCity',
    'StateOrProvinceAbbreviation' => 'getStateOrProvinceAbbreviation',
    'Country' => 'getCountry',
    'IsVA' => 'getIsVA',
    'Name' => 'getName',
    'Family' => 'getFamily',
    'OrgToFamilyRelationship' => 'getOrgToFamilyRelationship',
    'OrgEmail' => 'getOrgEmail',
    'OrgFax' => 'getOrgFax',
    'OrgPhone' => 'getOrgPhone',
    'OrgTTY' => 'getOrgTTY',
    'ContactEmail' => 'getContactEmail',
    'ContactName' => 'getContactName',
    'ContactPhone' => 'getContactPhone',
    'RecruitmentStatus' => 'getRecruitmentStatus',
    'LocalSiteIdentifier' => 'getLocalSiteIdentifier',
  ];

  /**
   * Constructor.
   *
   * @param mixed[] $data
   *   Associative array of property values for initializing the model
   *   from another instance.
   */
  public function __construct(array $data = NULL) {
    $this->container['AddressLine1'] = isset($data['AddressLine1']) ? $data['AddressLine1'] : NULL;
    $this->container['AddressLine2'] = isset($data['AddressLine2']) ? $data['AddressLine2'] : NULL;
    $this->container['PostalCode'] = isset($data['PostalCode']) ? $data['PostalCode'] : NULL;
    $this->container['Coordinates'] = isset($data['Coordinates']) ? $data['Coordinates'] : NULL;
    $this->container['City'] = isset($data['City']) ? $data['City'] : NULL;
    $this->container['StateOrProvinceAbbreviation'] = isset($data['StateOrProvinceAbbreviation']) ? $data['StateOrProvinceAbbreviation'] : NULL;
    $this->container['Country'] = isset($data['Country']) ? $data['Country'] : NULL;
    $this->container['IsVA'] = isset($data['IsVA']) ? $data['IsVA'] : NULL;
    $this->container['Name'] = isset($data['Name']) ? $data['Name'] : NULL;
    $this->container['Family'] = isset($data['Family']) ? $data['Family'] : NULL;
    $this->container['OrgToFamilyRelationship'] = isset($data['OrgToFamilyRelationship']) ? $data['OrgToFamilyRelationship'] : NULL;
    $this->container['OrgEmail'] = isset($data['OrgEmail']) ? $data['OrgEmail'] : NULL;
    $this->container['OrgFax'] = isset($data['OrgFax']) ? $data['OrgFax'] : NULL;
    $this->container['OrgPhone'] = isset($data['OrgPhone']) ? $data['OrgPhone'] : NULL;
    $this->container['OrgTTY'] = isset($data['OrgTTY']) ? $data['OrgTTY'] : NULL;
    $this->container['ContactEmail'] = isset($data['ContactEmail']) ? $data['ContactEmail'] : NULL;
    $this->container['ContactName'] = isset($data['ContactName']) ? $data['ContactName'] : NULL;
    $this->container['ContactPhone'] = isset($data['ContactPhone']) ? $data['ContactPhone'] : NULL;
    $this->container['RecruitmentStatus'] = isset($data['RecruitmentStatus']) ? $data['RecruitmentStatus'] : NULL;
    $this->container['LocalSiteIdentifier'] = isset($data['LocalSiteIdentifier']) ? $data['LocalSiteIdentifier'] : NULL;
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
