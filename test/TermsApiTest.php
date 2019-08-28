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
   * Test case for searchTermsByPost.
   *
   * Search Terms by POST.
   */
  public function testSearchTermsByPost() {
    $this->markTestIncomplete('This test has not been implemented.');
  }

}
