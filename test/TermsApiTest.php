<?php

namespace Test;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use NCIOCPL\ClinicalTrialSearch\TermsApi;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration;

/**
 * Tests for the Terms Api methods.
 */
class TermsApiTest extends TestCase {

  /**
   * Confirm that requests for GetTermByKey have the expected format.
   */
  public function testGetTermByTermKeyRequestStructure() {

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

    $apiInstance = new TermsApi($client->getClient(), $config);

    $key = 'turducken';

    // We don't care about the return for this test, so we'll skip it.
    $apiInstance->getTermByTermKey($key);

    $history = $client->getHistory();

    $this->assertSame(1, count($history));

    $request = $history[0]['request'];

    $this->assertSame('GET', $request->getMethod());
    $this->assertSame('https://chicken/v1/term/turducken', $request->getUri() . '');
  }

  /**
   * Test case for getTermByTermKey when a term is found.
   */
  public function testGetTermByTermKey() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      '{"term_key":"acute_myeloid_leukemia_in_remission","term":"Acute Myeloid Leukemia in Remission","term_type":"_diseases","current_trial_statuses":["ACTIVE","CLOSED TO ACCRUAL","WITHDRAWN","CLOSED TO ACCRUAL AND INTERVENTION","ADMINISTRATIVELY COMPLETE","COMPLETE","ENROLLING BY INVITATION","APPROVED","IN REVIEW","TEMPORARILY CLOSED TO ACCRUAL"],"count":109,"count_normalized":0.02507097917378355,"codes":["C3588"]}'
    );

    $client = new MockClient([$response]);

    $apiInstance = new TermsApi($client->getClient());

    $key = 'acute_myeloid_leukemia_in_remission';
    $term = $apiInstance->getTermByTermKey($key);

    // Expect a Term.
    $this->assertNotNull($term);

    $this->assertSame('acute_myeloid_leukemia_in_remission', $term->TermKey);
    $this->assertSame('Acute Myeloid Leukemia in Remission', $term->Term);
    $this->assertSame('_diseases', $term->TermType);
    $this->assertSame(1, count($term->Codes));
    $this->assertSame('C3588', $term->Codes[0]);
  }

  /**
   * Test getTermByTermKey for the case where no results are found.
   */
  public function testGetTermByTermKeyNoResult() {

    // Create a response simulating what happens when there's no match.
    $noResultResponse = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      '{}'
    );

    $client = new MockClient([$noResultResponse]);

    $apiInstance = new TermsApi($client->getClient());

    $key = 'turducken';
    $term = $apiInstance->getTermByTermKey($key);

    // Expect a Term, even though its components are NULL.
    $this->assertNotNull($term);

    $this->assertNull($term->TermKey);
    $this->assertNull($term->Term);
    $this->assertNull($term->TermType);
    $this->assertNull($term->Codes);
  }

  /**
   * Error test getTermByTermKey for case where no term key is specified.
   */
  public function testGetTermByTermKeyNoKeySpecified() {

    // Mark this test as expected to throw an instance of ApiException.
    $this->expectException(ApiException::class);

    // Create a failure response. (This is what GetTermByKey returns
    // if no key is set.)
    $errorResponse = new Response(
      404,
      ['content-type' => 'text/html; charset=utf-8'],
      '<!DOCTYPE html><html><head><title></title><link rel="stylesheet" href="stylesheets/style.css"></head><body><h1>Not Found</h1><h2></h2><pre></pre></body></html>'
    );

    $client = new MockClient([$errorResponse]);

    $apiInstance = new TermsApi($client->getClient());

    $key = '';
    $term = $apiInstance->getTermByTermKey($key);

    $this->assertNull($term);
  }

  /**
   * Test case for searchTermsByGet.
   *
   * Search Terms by GET.
   */
  public function testSearchTermsByGet() {
    $this->markTestIncomplete('This test has not been implemented.');
  }

  /**
   * Confirm that requests for SearchTermsByPost have the expected structure.
   */
  public function testSearchTermsByPostRequestStructure() {

    // Create a mock response, details don't matter for this test.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      '{"total":5,"terms":[{"term_key":"aids_malignancy_consortium_united_states_md_rockville_20850_not_found_not_found_lat_39_0897_lon_77_1798_","term":"AIDS Malignancy Consortium","term_type":"_orgs_by_location","current_trial_statuses":["COMPLETE"],"count":6,"count_normalized":0.0034066014432492893,"org_country":"United States","org_state_or_province":"MD","org_city":"Rockville","org_postal_code":"20850","org_family":null,"org_to_family_relationship":null,"org_coordinates":{"lat":39.0897,"lon":-77.1798},"score":0},{"term_key":"national_cancer_institute_united_states_md_rockville_20850_nci_center_for_cancer_research_ccr_organizational_lat_39_0897_lon_77_1798_","term":"National Cancer Institute","term_type":"_orgs_by_location","current_trial_statuses":["ADMINISTRATIVELY COMPLETE","CLOSED TO ACCRUAL","COMPLETE"],"count":6,"count_normalized":0.0034066014432492893,"org_country":"United States","org_state_or_province":"MD","org_city":"Rockville","org_postal_code":"20850","org_family":"NCI Center for Cancer Research (CCR)","org_to_family_relationship":"ORGANIZATIONAL","org_coordinates":{"lat":39.0897,"lon":-77.1798},"score":0},{"term_key":"maryloncology_hematology_pa_aquilino_cancer_center_united_states_md_rockville_20850_not_found_not_found_lat_39_0897_lon_77_1798_","term":"Maryland Oncology Hematology PA-Aquilino Cancer Center","term_type":"_orgs_by_location","current_trial_statuses":["CLOSED TO ACCRUAL","CLOSED TO ACCRUAL AND INTERVENTION","ACTIVE"],"count":3,"count_normalized":0.0017043062122489671,"org_country":"United States","org_state_or_province":"MD","org_city":"Rockville","org_postal_code":"20850","org_family":null,"org_to_family_relationship":null,"org_coordinates":{"lat":39.0897,"lon":-77.1798},"score":0},{"term_key":"kaiser_permanente_shady_grove_medical_center_united_states_md_rockville_20850_not_found_not_found_lat_39_0897_lon_77_1798_","term":"Kaiser Permanente - Shady Grove Medical Center","term_type":"_orgs_by_location","current_trial_statuses":["CLOSED TO ACCRUAL"],"count":1,"count_normalized":0.0005683258063997007,"org_country":"United States","org_state_or_province":"MD","org_city":"Rockville","org_postal_code":"20850","org_family":null,"org_to_family_relationship":null,"org_coordinates":{"lat":39.0897,"lon":-77.1798},"score":0},{"term_key":"blood_marrow_transplant_clinical_trials_network_united_states_md_rockville_20850_not_found_not_found_lat_39_0897_lon_77_1798_","term":"Blood and Marrow Transplant Clinical Trials Network","term_type":"_orgs_by_location","current_trial_statuses":["CLOSED TO ACCRUAL"],"count":1,"count_normalized":0.0005683258063997007,"org_country":"United States","org_state_or_province":"MD","org_city":"Rockville","org_postal_code":"20850","org_family":null,"org_to_family_relationship":null,"org_coordinates":{"lat":39.0897,"lon":-77.1798},"score":0}]}'
    );

    // Set exepected hostname. (Exact value doesn't matter.)
    $config = new Configuration();
    $config->setHost('https://chicken');

    $client = new MockClient([$response]);

    $apiInstance = new TermsApi($client->getClient(), $config);

    $searchDocument = '{"org_postal_code": "20850"}';

    // We don't care about the return for this test, so we'll skip it.
    $apiInstance->searchTermsByPost($searchDocument);

    $history = $client->getHistory();

    $this->assertSame(1, count($history));

    $request = $history[0]['request'];

    $this->assertSame('POST', $request->getMethod());
    $this->assertSame('https://chicken/v1/terms', $request->getUri() . '');
    $this->assertSame($searchDocument, (string) $request->getBody());

    $this->assertTrue($request->hasHeader('Content-Type'));

    $contentType = $request->getHeader('Content-Type');
    $this->assertCount(1, $contentType);
    $this->assertSame('application/json', $contentType[0]);
  }

  /**
   * Test case for searchTermsByPost.
   *
   * Search Terms by POST.
   */
  public function testSearchTermsByPost() {
    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      '{"total":5,"terms":[{"term_key":"aids_malignancy_consortium_united_states_md_rockville_20850_not_found_not_found_lat_39_0897_lon_77_1798_","term":"AIDS Malignancy Consortium","term_type":"_orgs_by_location","current_trial_statuses":["COMPLETE"],"count":6,"count_normalized":0.0034066014432492893,"org_country":"United States","org_state_or_province":"MD","org_city":"Rockville","org_postal_code":"20850","org_family":null,"org_to_family_relationship":null,"org_coordinates":{"lat":39.0897,"lon":-77.1798},"score":0},{"term_key":"national_cancer_institute_united_states_md_rockville_20850_nci_center_for_cancer_research_ccr_organizational_lat_39_0897_lon_77_1798_","term":"National Cancer Institute","term_type":"_orgs_by_location","current_trial_statuses":["ADMINISTRATIVELY COMPLETE","CLOSED TO ACCRUAL","COMPLETE"],"count":6,"count_normalized":0.0034066014432492893,"org_country":"United States","org_state_or_province":"MD","org_city":"Rockville","org_postal_code":"20850","org_family":"NCI Center for Cancer Research (CCR)","org_to_family_relationship":"ORGANIZATIONAL","org_coordinates":{"lat":39.0897,"lon":-77.1798},"score":0},{"term_key":"maryloncology_hematology_pa_aquilino_cancer_center_united_states_md_rockville_20850_not_found_not_found_lat_39_0897_lon_77_1798_","term":"Maryland Oncology Hematology PA-Aquilino Cancer Center","term_type":"_orgs_by_location","current_trial_statuses":["CLOSED TO ACCRUAL","CLOSED TO ACCRUAL AND INTERVENTION","ACTIVE"],"count":3,"count_normalized":0.0017043062122489671,"org_country":"United States","org_state_or_province":"MD","org_city":"Rockville","org_postal_code":"20850","org_family":null,"org_to_family_relationship":null,"org_coordinates":{"lat":39.0897,"lon":-77.1798},"score":0},{"term_key":"kaiser_permanente_shady_grove_medical_center_united_states_md_rockville_20850_not_found_not_found_lat_39_0897_lon_77_1798_","term":"Kaiser Permanente - Shady Grove Medical Center","term_type":"_orgs_by_location","current_trial_statuses":["CLOSED TO ACCRUAL"],"count":1,"count_normalized":0.0005683258063997007,"org_country":"United States","org_state_or_province":"MD","org_city":"Rockville","org_postal_code":"20850","org_family":null,"org_to_family_relationship":null,"org_coordinates":{"lat":39.0897,"lon":-77.1798},"score":0},{"term_key":"blood_marrow_transplant_clinical_trials_network_united_states_md_rockville_20850_not_found_not_found_lat_39_0897_lon_77_1798_","term":"Blood and Marrow Transplant Clinical Trials Network","term_type":"_orgs_by_location","current_trial_statuses":["CLOSED TO ACCRUAL"],"count":1,"count_normalized":0.0005683258063997007,"org_country":"United States","org_state_or_province":"MD","org_city":"Rockville","org_postal_code":"20850","org_family":null,"org_to_family_relationship":null,"org_coordinates":{"lat":39.0897,"lon":-77.1798},"score":0}]}'
    );

    $client = new MockClient([$response]);

    $apiInstance = new TermsApi($client->getClient());

    $searchDocument = '{"org_postal_code": "20850"}';
    $termList = $apiInstance->searchTermsByPost($searchDocument);

    // We expect a collection.
    $this->assertNotNull($termList);

    $this->assertSame(5, $termList->TotalResults);
    $this->assertSame(5, count($termList->Term));

    $this->assertSame('NCIOCPL\ClinicalTrialSearch\Model\TermsCollection', get_class($termList));

    $term = $termList->Term[3];
    $this->assertSame('NCIOCPL\ClinicalTrialSearch\Model\Term', get_class($term));

    $this->assertSame('kaiser_permanente_shady_grove_medical_center_united_states_md_rockville_20850_not_found_not_found_lat_39_0897_lon_77_1798_', $term->TermKey);
    $this->assertSame('Kaiser Permanente - Shady Grove Medical Center', $term->Term);
    $this->assertSame('_orgs_by_location', $term->TermType);
  }

  /**
   * Test getTermByTermKey for the case where no results are found.
   */
  public function testSearchTermsByPostNoResult() {

    // Create a response simulating what happens when there's no match.
    $noResultResponse = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      '{"total":0,"terms":[]}'
    );

    $client = new MockClient([$noResultResponse]);

    $apiInstance = new TermsApi($client->getClient());

    // The search criteria don't matter since we're specify the response.
    $searchDocument = '{"org_postal_code": "20850"}';
    $termList = $apiInstance->searchTermsByPost($searchDocument);

    // Expect an empty term list.
    $this->assertNotNull($termList);

    $this->assertSame(0, $termList->TotalResults);
    $this->assertSame(0, count($termList->Term));
  }

  /**
   * Error test getTermByTermKey for case where no term key is specified.
   */
  public function testSearchTermsByPostBadInput() {

    // Mark this test as expected to throw an instance of ApiException.
    $this->expectException(ApiException::class);

    // Create a failure response. (This is what searchTermsByPost returns
    // with the search document broken in this manner.
    $errorResponse = new Response(
      500,
      ['content-type' => 'text/html; charset=utf-8'],
      '<!DOCTYPE html><html><head><title></title><link rel="stylesheet" href="stylesheets/style.css"></head><body><h1>Unexpected end of JSON input</h1><h2></h2><pre></pre></body></html>'
    );

    $client = new MockClient([$errorResponse]);

    $apiInstance = new TermsApi($client->getClient());

    // The search criteria don't matter since we're specify the response.
    $searchDocument = '{"org_postal_code": ';
    $termList = $apiInstance->searchTermsByPost($searchDocument);

    $this->assertNull($termList);
  }

}
