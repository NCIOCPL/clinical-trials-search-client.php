<?php

namespace NCIOCPL\ClinicalTrialSearch\Model;

use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Model\ModelInterface;

/**
 * Model for the ClinicalTrial objects.
 *
 * @package NCIOCPL\ClinicalTrialSearch
 */
class ClinicalTrial extends ModelCommon implements ModelInterface {

  const DISCRIMINATOR = NULL;

  /**
   * The original name of the model.
   *
   * @var string
   */
  protected static $swaggerModelName = 'ClinicalTrial';

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
    'NCIID' => 'string',
    'NCTID' => 'string',
    'ProtocolID' => 'string',
    'CCRID' => 'string',
    'CTEPID' => 'string',
    'DCPID' => 'string',
    'OtherTrialIDs' => '\NCIOCPL\ClinicalTrialSearch\Model\OtherId[]',
    'TrialPhase' => '\NCIOCPL\ClinicalTrialSearch\Model\Phase',
    'BriefTitle' => 'string',
    'OfficialTitle' => 'string',
    'BriefSummary' => 'string',
    'DetailedDescription' => 'string',
    'EligibilityInfo' => '\NCIOCPL\ClinicalTrialSearch\Model\EligibilityInformation',
    'PrimaryPurpose' => '\NCIOCPL\ClinicalTrialSearch\Model\PrimaryPurposeInformation',
    'CurrentTrialStatus' => 'string',
    'LeadOrganizationName' => 'string',
    'Collaborators' => '\NCIOCPL\ClinicalTrialSearch\Model\Collaborator[]',
    'PrincipalInvestigator' => 'string',
    'CentralContact' => '\NCIOCPL\ClinicalTrialSearch\Model\CentralContactInformation',
    'Sites' => '\NCIOCPL\ClinicalTrialSearch\Model\StudySite[]',
  ];

  /**
   * Mapping of property names to formatters.
   *
   * For now, always specify NULL.
   *
   * @var string[]
   */
  protected static $swaggerFormats = [
    'NCIID' => NULL,
    'NCTID' => NULL,
    'ProtocolID' => NULL,
    'CCRID' => NULL,
    'CTEPID' => NULL,
    'DCPID' => NULL,
    'OtherTrialIDs' => NULL,
    'TrialPhase' => NULL,
    'BriefTitle' => NULL,
    'OfficialTitle' => NULL,
    'BriefSummary' => NULL,
    'DetailedDescription' => NULL,
    'EligibilityInfo' => NULL,
    'PrimaryPurpose' => NULL,
    'CurrentTrialStatus' => NULL,
    'LeadOrganizationName' => NULL,
    'Collaborators' => NULL,
    'PrincipalInvestigator' => NULL,
    'CentralContact' => NULL,
    'Sites' => NULL,
  ];

  /**
   * Mapping of PHP property names to JSON property names.
   *
   * @var string[]
   */
  protected static $attributeMap = [
    'NCIID' => 'nci_id',
    'NCTID' => 'nct_id',
    'ProtocolID' => 'protocol_id',
    'CCRID' => 'ccr_id',
    'CTEPID' => 'ctep_id',
    'DCPID' => 'dcp_id',
    'OtherTrialIDs' => 'other_ids',
    'TrialPhase' => 'phase',
    'BriefTitle' => 'brief_title',
    'OfficialTitle' => 'official_title',
    'BriefSummary' => 'brief_summary',
    'DetailedDescription' => 'detail_description',
    'EligibilityInfo' => 'eligibility',
    'PrimaryPurpose' => 'primary_purpose',
    'CurrentTrialStatus' => 'current_trial_status',
    'LeadOrganizationName' => 'lead_org',
    'Collaborators' => 'collaborators',
    'PrincipalInvestigator' => 'principal_investigator',
    'CentralContact' => 'central_contact',
    'Sites' => 'sites',
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
    'NCIID' => 'setNCIID',
    'NCTID' => 'setNCTID',
    'ProtocolID' => 'setProtocolID',
    'CCRID' => 'setCCRID',
    'CTEPID' => 'setCTEPID',
    'DCPID' => 'setDCPID',
    'OtherTrialIDs' => 'setOtherTrialIDs',
    'TrialPhase' => 'setTrialPhase',
    'BriefTitle' => 'setBriefTitle',
    'OfficialTitle' => 'setOfficialTitle',
    'BriefSummary' => 'setBriefSummary',
    'DetailedDescription' => 'setDetailedDescription',
    'EligibilityInfo' => 'setEligibilityInfo',
    'PrimaryPurpose' => 'setPrimaryPurpose',
    'CurrentTrialStatus' => 'setCurrentTrialStatus',
    'LeadOrganizationName' => 'setLeadOrganizationName',
    'Collaborators' => 'setCollaborators',
    'PrincipalInvestigator' => 'setPrincipalInvestigator',
    'CentralContact' => 'setCentralContact',
    'Sites' => 'setSites',
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
    'NCIID' => 'getNCIID',
    'NCTID' => 'getNCTID',
    'ProtocolID' => 'getProtocolID',
    'CCRID' => 'getCCRID',
    'CTEPID' => 'getCTEPID',
    'DCPID' => 'getDCPID',
    'OtherTrialIDs' => 'getOtherTrialIDs',
    'TrialPhase' => 'getTrialPhase',
    'BriefTitle' => 'getBriefTitle',
    'OfficialTitle' => 'getOfficialTitle',
    'BriefSummary' => 'getBriefSummary',
    'DetailedDescription' => 'getDetailedDescription',
    'EligibilityInfo' => 'getEligibilityInfo',
    'PrimaryPurpose' => 'getPrimaryPurpose',
    'CurrentTrialStatus' => 'getCurrentTrialStatus',
    'LeadOrganizationName' => 'getLeadOrganizationName',
    'Collaborators' => 'getCollaborators',
    'PrincipalInvestigator' => 'getPrincipalInvestigator',
    'CentralContact' => 'getCentralContact',
    'Sites' => 'getSites',
  ];

  /**
   * Constructor.
   *
   * @param mixed[] $data
   *   Associative array of property values for initializing the model
   *   from another instance.
   */
  public function __construct(array $data = NULL) {
    $this->container['NCIID'] = isset($data['NCIID']) ? $data['NCIID'] : NULL;
    $this->container['NCTID'] = isset($data['NCTID']) ? $data['NCTID'] : NULL;
    $this->container['ProtocolID'] = isset($data['ProtocolID']) ? $data['ProtocolID'] : NULL;
    $this->container['CCRID'] = isset($data['CCRID']) ? $data['CCRID'] : NULL;
    $this->container['CTEPID'] = isset($data['CTEPID']) ? $data['CTEPID'] : NULL;
    $this->container['DCPID'] = isset($data['DCPID']) ? $data['DCPID'] : NULL;
    $this->container['OtherTrialIDs'] = isset($data['OtherTrialIDs']) ? $data['OtherTrialIDs'] : NULL;
    $this->container['TrialPhase'] = isset($data['TrialPhase']) ? $data['TrialPhase'] : NULL;
    $this->container['BriefTitle'] = isset($data['BriefTitle']) ? $data['BriefTitle'] : NULL;
    $this->container['OfficialTitle'] = isset($data['OfficialTitle']) ? $data['OfficialTitle'] : NULL;
    $this->container['BriefSummary'] = isset($data['BriefSummary']) ? $data['BriefSummary'] : NULL;
    $this->container['DetailedDescription'] = isset($data['DetailedDescription']) ? $data['DetailedDescription'] : NULL;
    $this->container['EligibilityInfo'] = isset($data['EligibilityInfo']) ? $data['EligibilityInfo'] : NULL;
    $this->container['PrimaryPurpose'] = isset($data['PrimaryPurpose']) ? $data['PrimaryPurpose'] : NULL;
    $this->container['CurrentTrialStatus'] = isset($data['CurrentTrialStatus']) ? $data['CurrentTrialStatus'] : NULL;
    $this->container['LeadOrganizationName'] = isset($data['LeadOrganizationName']) ? $data['LeadOrganizationName'] : NULL;
    $this->container['Collaborators'] = isset($data['Collaborators']) ? $data['Collaborators'] : NULL;
    $this->container['PrincipalInvestigator'] = isset($data['PrincipalInvestigator']) ? $data['PrincipalInvestigator'] : NULL;
    $this->container['CentralContact'] = isset($data['CentralContact']) ? $data['CentralContact'] : NULL;
    $this->container['Sites'] = isset($data['Sites']) ? $data['Sites'] : NULL;
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
