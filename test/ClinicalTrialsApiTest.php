<?php

namespace Test;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use NCIOCPL\ClinicalTrialSearch\ClinicalTrialsApi;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration;

/**
 * Tests for the Diseases Api methods.
 */
class ClinicalTrialsApiTest extends TestCase {

  const SIMPLE_TRIAL = '{"nci_id":"NCI-2015-00054","nct_id":"NCT02465060","protocol_id":"EAY131","ccr_id":"CCR-ID","ctep_id":"EAY131","dcp_id":"DCP-ID","other_ids":[{"name":"other-name-1", "value":"other-value-1"},{"name":"other-name-2", "value":"other-value-2"},{"name":"other-name-3", "value":"other-value-3"},{"name":"other-name-4", "value":"other-value-4"}],"current_trial_status":"Active","brief_title":"Targeted Therapy Directed by Genetic Testing in Treating Patients with Advanced Refractory Solid Tumors, Lymphomas, or Multiple Myeloma (The MATCH Screening Trial)","official_title":"Molecular Analysis for Therapy Choice (MATCH)","brief_summary":"This is the brief summary.","detail_description":"This is the Detailed Description","primary_purpose":{"primary_purpose_code":"TREATMENT","primary_purpose_other_text":"Other primary purpose text","primary_purpose_additional_qualifier_code":"Primary purpose additonal qualifier text"},"phase":{"phase":"II","phase_other_text":"TWO","phase_additional_qualifier_code":"NO"},"principal_investigator":"Keith Thomas Flaherty","central_contact":{"central_contact_email":"TEST@TEST.TEST","central_contact_name":"Contact Name","central_contact_phone":"+1-123-456-7890","central_contact_type":"A Contact Person"},"lead_org":"ECOG-ACRIN Cancer Research Group","collaborators":[{"name":"National Cancer Institute","functional_role":"FUNDING_SOURCE","status":"Active"},{"name":"Second Collaborator","functional_role":"Test data","status":"Present"}],"sites":[{"contact_email":null,"contact_name":"Site Public Contact","contact_phone":"123-456-7890","recruitment_status":"ACTIVE","recruitment_status_date":"2019-09-06","local_site_identifier":"","org_address_line_1":"Address Line 1","org_address_line_2":null,"org_city":"City","org_country":"United States","org_email":null,"org_family":"Family family family","org_fax":null,"org_name":"Organization Name","org_to_family_relationship":"Parent","org_phone":"098-765-4321","org_postal_code":"02135","org_state_or_province":"RI","org_status":"ACTIVE","org_status_date":"2008-12-31","org_tty":null,"org_va":false,"org_coordinates":{"lat":41.8204,"lon":-71.4128}},{"contact_email":"TEST2@TEST.TEST","contact_name":"Site Public Contact2","contact_phone":"223-456-7890","recruitment_status":"ACTIVE2","recruitment_status_date":"2019-01-01","local_site_identifier":"NONE","org_address_line_1":"2nd Address Line 1","org_address_line_2":"2nd Line 2","org_city":"Second City","org_country":"Iceland","org_email":"TEST3@TEST.TEST","org_family":"Family family family family","org_fax":"111-222-3333","org_name":"Organization Name 2","org_to_family_relationship":"Child","org_phone":"444-555-6666","org_postal_code":"98765","org_state_or_province":"KY","org_status":"INACTIVE","org_status_date":"2008-12-07","org_tty":"555-555-1212","org_va":true,"org_coordinates":{"lat":36.1831,"lon":-115.2587}}],"anatomic_sites":["Multiple"],"diseases":[{"inclusion_indicator":"TRIAL","lead_disease_indicator":"NO","nci_thesaurus_concept_id":"C9039","preferred_name":"Cervical Carcinoma","display_name":"Cervical Cancer","paths":null,"type":["maintype"],"synonyms":["Cancer of Cervix","Cancer of Uterine Cervix","Cancer of the Cervix","Cancer of the Uterine Cervix","Carcinoma of Cervix","Carcinoma of Cervix Uteri","Carcinoma of Uterine Cervix","Carcinoma of the Cervix","Carcinoma of the Cervix Uteri","Carcinoma of the Uterine Cervix","Cervical Carcinoma","Cervical cancer, NOS","Cervix Cancer","Cervix Carcinoma","Cervix Uteri Carcinoma","Uterine Cervix Cancer","Uterine Cervix Carcinoma","cervical cancer"],"parents":["C2916","C9311"]},{"inclusion_indicator":"TRIAL","lead_disease_indicator":"NO","nci_thesaurus_concept_id":"C7804","preferred_name":"Recurrent Cervical Carcinoma","display_name":"Recurrent Cervical Cancer","paths":[{"direction":1,"concepts":[{"idx":0,"label":"Cervical Carcinoma","code":"C9039"}]}],"type":["stage"],"synonyms":["Cervical Carcinoma Recurrent","Recurrent Carcinoma of Cervix","Recurrent Carcinoma of Cervix Uteri","Recurrent Carcinoma of Uterine Cervix","Recurrent Carcinoma of the Cervix","Recurrent Carcinoma of the Cervix Uteri","Recurrent Carcinoma of the Uterine Cervix","Recurrent Cervical Carcinoma","Recurrent Cervix Uteri Carcinoma","Recurrent Uterine Cervix Carcinoma","Relapsed Carcinoma of Cervix","Relapsed Carcinoma of Cervix Uteri","Relapsed Carcinoma of Uterine Cervix","Relapsed Carcinoma of the Cervix","Relapsed Carcinoma of the Cervix Uteri","Relapsed Carcinoma of the Uterine Cervix","Relapsed Cervical Carcinoma","Relapsed Cervix Carcinoma","Relapsed Cervix Uteri Carcinoma","Relapsed Uterine Cervix Carcinoma"],"parents":["C9039","C7620"]},{"inclusion_indicator":"TRIAL","lead_disease_indicator":"NO","nci_thesaurus_concept_id":"C7558","preferred_name":"Endometrial Carcinoma","display_name":"Endometrial Cancer","paths":[{"direction":1,"concepts":[{"idx":0,"label":"Uterine Corpus Cancer","code":"C61574"}]}],"type":["subtype"],"synonyms":["CARCINOMA, ENDOMETRIAL, MALIGNANT","Carcinoma of Endometrium","Carcinoma of the Endometrium","Endometrial Carcinoma","endometrial cancer"],"parents":["C2916","C27815","C61574"]}],"biomarkers":null,"minimum_target_accrual_number":6452,"eligibility":{"structured":{"gender":"BOTH","max_age":"999 Years","max_age_number":999,"max_age_unit":"Years","min_age":"18 Years","min_age_number":18,"min_age_unit":"Years","max_age_in_years":999,"min_age_in_years":18},"unstructured":[{"display_order":1,"inclusion_indicator":true,"description":"ELIGIBILITY CRITERIA FOR SCREENING BIOPSY (STEP 0)"},{"display_order":2,"inclusion_indicator":false,"description":"Women of childbearing potential must have a negative serum pregnancy test within 2 weeks prior to registration; patients that are pregnant or breast feeding are excluded; a female of childbearing potential is any woman, regardless of sexual orientation or whether they have undergone tubal ligation, who meets the following criteria: \r\n* Has not undergone a hysterectomy or bilateral oophorectomy; or \r\n* Has not been naturally postmenopausal for at least 24 consecutive months (i.e., has had menses at any time in the preceding 24 consecutive months)"},{"display_order":3,"inclusion_indicator":true,"description":"Women of childbearing potential and men must agree to use adequate contraception (hormonal or barrier method of birth control; abstinence) prior to study entry, for the duration of study participation, and for 4 months after completion of study; should a woman become pregnant or suspect while she or her partner is participating in this study, she should inform her treating physician immediately"}]}}';

  /**
   * Confirm that requests for getTrialById have the expected structure.
   *
   * Get Trial.
   */
  public function testGetTrialByIdRequestStructure() {

    // Create a mock response, details don't matter for this test.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      '{"term_key":"acute_myeloid_leukemia_in_remission","term":"Acute Myeloid Leukemia in Remission","term_type":"_diseases","current_trial_statuses":["ACTIVE","CLOSED TO ACCRUAL","WITHDRAWN","CLOSED TO ACCRUAL AND INTERVENTION","ADMINISTRATIVELY COMPLETE","COMPLETE","ENROLLING BY INVITATION","APPROVED","IN REVIEW","TEMPORARILY CLOSED TO ACCRUAL"],"count":109,"count_normalized":0.02507097917378355,"codes":["C3588"]}'
    );

    // Set exepected hostname. (Exact value doesn't matter.)
    $config = new Configuration();
    $config->setHost('https://chicken');

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient(), $config);

    $trialID = 'NCT02465060';

    // We don't care about the return for this test, so we'll skip it.
    $apiInstance->getTrialById($trialID);

    $history = $client->getHistory();

    // Verify that there is only one request.
    $this->assertSame(1, count($history));

    $request = $history[0]['request'];

    $this->assertSame('GET', $request->getMethod());
    $this->assertSame('https://chicken/v1/clinical-trial/NCT02465060', $request->getUri() . '');
  }

  /**
   * Test case for getTrialById for scalar attributes.
   */
  public function testGetTrialByIdScalarAttributes() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      self::SIMPLE_TRIAL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

    $this->assertSame('NCI-2015-00054', $trial->NCIID, "NCIID");
    $this->assertSame('NCT02465060', $trial->NCTID, "NCTID");
    $this->assertSame('EAY131', $trial->ProtocolID, "ProtocolID");
    $this->assertSame('CCR-ID', $trial->CCRID, "CCRID");
    $this->assertSame('EAY131', $trial->CTEPID, "CTEPID");
    $this->assertSame('DCP-ID', $trial->DCPID, "DCPID");
    $this->assertSame('Targeted Therapy Directed by Genetic Testing in Treating Patients with Advanced Refractory Solid Tumors, Lymphomas, or Multiple Myeloma (The MATCH Screening Trial)', $trial->BriefTitle, "BriefTitle");
    $this->assertSame('Molecular Analysis for Therapy Choice (MATCH)', $trial->OfficialTitle, "OfficialTitle");
    $this->assertSame('This is the brief summary.', $trial->BriefSummary, "BriefSummary");
    $this->assertSame('This is the Detailed Description', $trial->DetailedDescription, "DetailedDescription");
    $this->assertSame('Active', $trial->CurrentTrialStatus, "CurrentTrialStatus");
    $this->assertSame('ECOG-ACRIN Cancer Research Group', $trial->LeadOrganizationName, "LeadOrganizationName");
    $this->assertSame('Keith Thomas Flaherty', $trial->PrincipalInvestigator, "PrincipalInvestigator");

  }

  /**
   * Test case for getTrialById for the OtherTrialIDs property.
   */
  public function testGetTrialByIdOtherIds() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      self::SIMPLE_TRIAL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

    // Is the OtherTrialIDs attribute present with the correct size?
    $this->assertNotNull($trial->OtherTrialIDs);
    $this->assertTrue(is_array($trial->OtherTrialIDs), 'is array');
    $this->assertSame(4, count($trial->OtherTrialIDs), 'OtherTrialIDs');

    $otherID = $trial->OtherTrialIDs[0];
    $this->assertSame('other-name-1', $otherID->Name, 'otherID->Name');
    $this->assertSame('other-value-1', $otherID->Value, 'otherID->Value');

    $otherID = $trial->OtherTrialIDs[1];
    $this->assertSame('other-name-2', $otherID->Name, 'otherID->Name');
    $this->assertSame('other-value-2', $otherID->Value, 'otherID->Value');

    $otherID = $trial->OtherTrialIDs[2];
    $this->assertSame('other-name-3', $otherID->Name, 'otherID->Name');
    $this->assertSame('other-value-3', $otherID->Value, 'otherID->Value');

    $otherID = $trial->OtherTrialIDs[3];
    $this->assertSame('other-name-4', $otherID->Name, 'otherID->Name');
    $this->assertSame('other-value-4', $otherID->Value, 'otherID->Value');
  }

  /**
   * Test case for getTrialById for the TrialPhase property.
   */
  public function testGetTrialByIdPhase() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      self::SIMPLE_TRIAL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

    // Is the TrialPhase attribute present?
    $this->assertNotNull($trial->TrialPhase);
    $this->assertFalse(is_array($trial->TrialPhase), 'is not array');

    $phase = $trial->TrialPhase;
    $this->assertSame('II', $phase->PhaseNumber, 'phase->PhaseNumber');
    $this->assertSame('TWO', $phase->PhaseOtherText, 'phase->PhaseOtherText');
    $this->assertSame('NO', $phase->PhaseAdditionalQualifierCode, 'phase->PhaseAdditionalQualifierCode');
  }

  /**
   * Test case for getTrialById for Eligibility->StructuredCriteria.
   */
  public function testGetTrialByIdEligibilityStructured() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      self::SIMPLE_TRIAL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

    // Is the EligibilityInfo attribute present?
    $this->assertNotNull($trial->EligibilityInfo);
    $this->assertFalse(is_array($trial->EligibilityInfo), 'is not array');

    // Check the StructuredCriteria sub-property.
    $this->assertNotNull($trial->EligibilityInfo->StructuredCriteria);
    $this->assertFalse(is_array($trial->EligibilityInfo->StructuredCriteria), 'is not array');

    $structured = $trial->EligibilityInfo->StructuredCriteria;
    $this->assertSame('BOTH', $structured->Gender, 'EligibilityInfo->StructuredCriteria->Gender');
    $this->assertSame('999 Years', $structured->MaxAgeStr, 'EligibilityInfo->StructuredCriteria->MaxAgeStr');
    $this->assertSame(999, $structured->MaxAgeInt, 'EligibilityInfo->StructuredCriteria->MaxAgeInt');
    $this->assertSame('Years', $structured->MaxAgeUnits, 'EligibilityInfo->StructuredCriteria->MaxAgeUnits');
    $this->assertSame('18 Years', $structured->MinAgeStr, 'EligibilityInfo->StructuredCriteria->MinAgeStr');
    $this->assertSame(18, $structured->MinAgeInt, 'EligibilityInfo->StructuredCriteria->MinAgeInt');
    $this->assertSame('Years', $structured->MinAgeUnits, 'EligibilityInfo->StructuredCriteria->MinAgeUnits');
  }

  /**
   * Test case for getTrialById for Eligibility->UnstructuredCriteria.
   */
  public function testGetTrialByIdEligibilityUnstructured() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      self::SIMPLE_TRIAL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

    // Is the EligibilityInfo attribute present?
    $this->assertNotNull($trial->EligibilityInfo);
    $this->assertFalse(is_array($trial->EligibilityInfo), 'is not array');

    // Check the StructuredCriteria sub-property.
    $this->assertNotNull($trial->EligibilityInfo->UnstructuredCriteria);
    $this->assertTrue(is_array($trial->EligibilityInfo->UnstructuredCriteria), 'is array');
    $this->assertSame(3, count($trial->EligibilityInfo->UnstructuredCriteria), 'Array size');

    $criterion = $trial->EligibilityInfo->UnstructuredCriteria[0];
    $this->assertSame(TRUE, $criterion->IsInclusionCriterion, 'EligibilityInfo->UnstructuredCriteria->IsInclusionCriterion');
    $this->assertSame('ELIGIBILITY CRITERIA FOR SCREENING BIOPSY (STEP 0)', $criterion->Description, 'EligibilityInfo->UnstructuredCriteria->Description');

    $criterion = $trial->EligibilityInfo->UnstructuredCriteria[1];
    $this->assertSame(FALSE, $criterion->IsInclusionCriterion, 'EligibilityInfo->UnstructuredCriteria->IsInclusionCriterion');
    $this->assertSame("Women of childbearing potential must have a negative serum pregnancy test within 2 weeks prior to registration; patients that are pregnant or breast feeding are excluded; a female of childbearing potential is any woman, regardless of sexual orientation or whether they have undergone tubal ligation, who meets the following criteria: \r\n* Has not undergone a hysterectomy or bilateral oophorectomy; or \r\n* Has not been naturally postmenopausal for at least 24 consecutive months (i.e., has had menses at any time in the preceding 24 consecutive months)", $criterion->Description, 'EligibilityInfo->UnstructuredCriteria->Description');

    $criterion = $trial->EligibilityInfo->UnstructuredCriteria[2];
    $this->assertSame(TRUE, $criterion->IsInclusionCriterion, 'EligibilityInfo->UnstructuredCriteria->IsInclusionCriterion');
    $this->assertSame("Women of childbearing potential and men must agree to use adequate contraception (hormonal or barrier method of birth control; abstinence) prior to study entry, for the duration of study participation, and for 4 months after completion of study; should a woman become pregnant or suspect while she or her partner is participating in this study, she should inform her treating physician immediately", $criterion->Description, 'EligibilityInfo->UnstructuredCriteria->Description');
  }

  /**
   * Test case for getTrialById for PrimaryPurpose.
   */
  public function testGetTrialByIdPrimaryPurpose() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      self::SIMPLE_TRIAL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

    // Is the EligibilityInfo attribute present?
    $this->assertNotNull($trial->PrimaryPurpose);
    $this->assertFalse(is_array($trial->PrimaryPurpose), 'is not array');

    $purpose = $trial->PrimaryPurpose;
    $this->assertSame('TREATMENT', $purpose->Code, 'PrimaryPurpose->Code');
    $this->assertSame('Other primary purpose text', $purpose->OtherText, 'PrimaryPurpose->OtherText');
    $this->assertSame('Primary purpose additonal qualifier text', $purpose->AdditionalQualifierCode, 'PrimaryPurpose->AdditionalQualifierCode');
  }

  /**
   * Test case for getTrialById for Collaborators.
   */
  public function testGetTrialByIdCollaborators() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      self::SIMPLE_TRIAL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

    // Is the EligibilityInfo attribute present?
    $this->assertNotNull($trial->Collaborators);
    $this->assertTrue(is_array($trial->Collaborators), 'is array');
    $this->assertSame(2, count($trial->Collaborators));

    $collab = $trial->Collaborators[0];
    $this->assertSame('National Cancer Institute', $collab->Name, 'Collaborator->Name');
    $this->assertSame('FUNDING_SOURCE', $collab->FunctionalRole, 'Collaborator->FunctionalRole');
    $this->assertSame('Active', $collab->Status, 'Collaborator->Status');

    $collab = $trial->Collaborators[1];
    $this->assertSame('Second Collaborator', $collab->Name, 'Collaborator->Name');
    $this->assertSame('Test data', $collab->FunctionalRole, 'Collaborator->FunctionalRole');
    $this->assertSame('Present', $collab->Status, 'Collaborator->Status');
  }

  /**
   * Test case for getTrialById for Central Contact.
   */
  public function testGetTrialByIdCentralContact() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      self::SIMPLE_TRIAL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

    // Is the EligibilityInfo attribute present?
    $this->assertNotNull($trial->CentralContact);
    $this->assertFalse(is_array($trial->CentralContact), 'is not array');

    $this->assertSame('TEST@TEST.TEST', $trial->CentralContact->Email, 'CentralContact->Email');
    $this->assertSame('Contact Name', $trial->CentralContact->Name, 'CentralContact->Name');
    $this->assertSame('+1-123-456-7890', $trial->CentralContact->Phone, 'CentralContact->Phone');
    $this->assertSame('A Contact Person', $trial->CentralContact->Type, 'CentralContact->Type');
  }

  /**
   * Test case for getTrialById for Siter.
   */
  public function testGetTrialByIdSites() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      self::SIMPLE_TRIAL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

    // Is the EligibilityInfo attribute present?
    $this->assertNotNull($trial->Sites);
    $this->assertTrue(is_array($trial->Sites), 'is array');
    $this->assertSame(2, count($trial->Sites), 'array size');

    $site = $trial->Sites[0];
    $this->assertSame('Address Line 1', $site->AddressLine1, 'Sites->AddressLine1');
    $this->assertNull($site->AddressLine2, 'Sites->AddressLine2');
    $this->assertSame('02135', $site->PostalCode, 'Sites->PostalCode');
    $this->assertSame('City', $site->City, 'Sites->City');
    $this->assertSame('RI', $site->StateOrProvinceAbbreviation, 'Sites->StateOrProvinceAbbreviation');
    $this->assertSame('United States', $site->Country, 'Sites->Country');
    $this->assertFalse($site->IsVA, 'Sites->IsVA');
    $this->assertSame('Organization Name', $site->Name, 'Sites->Name');
    $this->assertSame('Family family family', $site->Family, 'Sites->Family');
    $this->assertSame('Parent', $site->OrgToFamilyRelationship, 'Sites->OrgToFamilyRelationship');
    $this->assertNull($site->OrgEmail, 'Sites->OrgEmail');
    $this->assertNull($site->OrgFax, 'Sites->OrgFax');
    $this->assertSame('098-765-4321', $site->OrgPhone, 'Sites->OrgPhone');
    $this->assertNull($site->OrgTTY, 'Sites->OrgTTY');
    $this->assertNull($site->ContactEmail, 'Sites->ContactEmail');
    $this->assertSame('Site Public Contact', $site->ContactName, 'Sites->ContactName');
    $this->assertSame('123-456-7890', $site->ContactPhone, 'Sites->ContactPhone');
    $this->assertSame('ACTIVE', $site->RecruitmentStatus, 'Sites->RecruitmentStatus');
    $this->assertSame('', $site->LocalSiteIdentifier, 'Sites->LocalSiteIdentifier');

    $site = $trial->Sites[1];
    $this->assertSame('2nd Address Line 1', $site->AddressLine1, 'Sites->AddressLine1');
    $this->assertSame('2nd Line 2', $site->AddressLine2, 'Sites->AddressLine2');
    $this->assertSame('98765', $site->PostalCode, 'Sites->PostalCode');
    $this->assertSame('Second City', $site->City, 'Sites->City');
    $this->assertSame('KY', $site->StateOrProvinceAbbreviation, 'Sites->StateOrProvinceAbbreviation');
    $this->assertSame('Iceland', $site->Country, 'Sites->Country');
    $this->assertTrue($site->IsVA, 'Sites->IsVA');
    $this->assertSame('Organization Name 2', $site->Name, 'Sites->Name');
    $this->assertSame('Family family family family', $site->Family, 'Sites->Family');
    $this->assertSame('Child', $site->OrgToFamilyRelationship, 'Sites->OrgToFamilyRelationship');
    $this->assertSame('TEST3@TEST.TEST', $site->OrgEmail, 'Sites->OrgEmail');
    $this->assertSame('111-222-3333', $site->OrgFax, 'Sites->OrgFax');
    $this->assertSame('444-555-6666', $site->OrgPhone, 'Sites->OrgPhone');
    $this->assertSame('555-555-1212', $site->OrgTTY, 'Sites->OrgTTY');
    $this->assertSame('TEST2@TEST.TEST', $site->ContactEmail, 'Sites->ContactEmail');
    $this->assertSame('Site Public Contact2', $site->ContactName, 'Sites->ContactName');
    $this->assertSame('223-456-7890', $site->ContactPhone, 'Sites->ContactPhone');
    $this->assertSame('ACTIVE2', $site->RecruitmentStatus, 'Sites->RecruitmentStatus');
    $this->assertSame('NONE', $site->LocalSiteIdentifier, 'Sites->LocalSiteIdentifier');
  }

  /**
   * Test case for getTrialById for Site Geolocation.
   */
  public function testGetTrialByIdSiteGeolocation() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      self::SIMPLE_TRIAL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

    // Is the Coordinates attribute present?
    $this->assertNotNull($trial->Sites[0]->Coordinates);
    $this->assertFalse(is_array($trial->Sites[0]->Coordinates), 'is not array');

    $coordinates = $trial->Sites[0]->Coordinates;
    $this->assertSame(41.8204, $coordinates->Latitude, 'Sites->Coordinates->Latitude');
    $this->assertSame(-71.4128, $coordinates->Longitude, 'Sites->Coordinates->Longitude');

    $coordinates = $trial->Sites[1]->Coordinates;
    $this->assertSame(36.1831, $coordinates->Latitude, 'Sites->Coordinates->Latitude');
    $this->assertSame(-115.2587, $coordinates->Longitude, 'Sites->Coordinates->Longitude');
  }

  /**
   * Test getTrialById for the case where no results are found.
   */
  public function testGetTrialByIdNoResults() {

    // Mark this test as expected to throw an instance of ApiException,
    // with an expected 404 code.
    $this->expectException(ApiException::class);
    $this->expectExceptionCode(404);

    // Create the expected (successful) response.
    $response = new Response(
      404,
      ['content-type' => 'application/json; charset=utf-8'],
      NULL
    );

    $client = new MockClient([$response]);

    $apiInstance = new ClinicalTrialsApi($client->getClient());

    $trialID = 'NCT02465060';
    $trial = $apiInstance->getTrialById($trialID);

    $this->assertNotNull($trial);

  }

  /**
   * Test case for testSearchTrialsByGet.
   *
   * Search Trials by POST.
   */
  public function testSearchTrialsByGet() {
    $this->markTestIncomplete('This test has not been implemented.');
  }

  /**
   * Test case for searchTrialsByPost.
   *
   * Search Trials by POST.
   */
  public function testSearchTrialsByPost() {
    $this->markTestIncomplete('This test has not been implemented.');
  }

}
