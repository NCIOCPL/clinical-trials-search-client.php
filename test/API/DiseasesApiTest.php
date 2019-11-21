<?php

namespace Test\API;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use NCIOCPL\ClinicalTrialSearch\DiseasesApi;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration;

use Test\MockClient;

/**
 * Tests for the Diseases Api methods.
 */
class DiseasesApiTest extends TestCase {

  /**
   * Test case for searchDiseasesByGet.
   *
   * Search Diseases by GET.
   */
  public function testSearchDiseasesByGet() {
    $this->markTestIncomplete('This test has not been implemented.');
  }

  /**
   * Confirm that requests for searchDiseasesByPost have the expected structure.
   */
  public function testSearchDiseasesByPostRequestStructure() {

    // Create a mock response, details don't matter for this test.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      '{"terms":[{"name":"ASPH-Positive Head and Neck Squamous Cell Carcinoma","codes":["C162770"],"ancestor_ids":["C35850"],"parent_ids":["C35850"],"type":["subtype"]},{"name":"Advanced Head and Neck Cancer","codes":["C129861"],"ancestor_ids":["C35850"],"parent_ids":["C35850"],"type":["subtype"]},{"name":"Advanced Head and Neck Squamous Cell Cancer","codes":["C139291"],"ancestor_ids":["C35850"],"parent_ids":["C35850"],"type":["subtype"]},{"name":"Cutaneous Squamous Cell Carcinoma of the Head and Neck","codes":["C133252"],"ancestor_ids":["C35850"],"parent_ids":["C35850"],"type":["subtype"]},{"name":"Head and Neck Basaloid Carcinoma","codes":["C37290"],"ancestor_ids":["C35850"],"parent_ids":["C35850"],"type":["subtype"]}]}'
    );

    // Set exepected hostname. (Exact value doesn't matter.)
    $config = new Configuration();
    $config->setHost('https://chicken');

    $client = new MockClient([$response]);

    $apiInstance = new DiseasesApi($client->getClient(), $config);

    $searchDocument = '{"name":"Head"}';

    // We don't care about the return for this test, so we'll skip it.
    $apiInstance->searchDiseasesByPost($searchDocument);

    $history = $client->getHistory();

    $this->assertSame(1, count($history));

    $request = $history[0]['request'];

    $this->assertSame('POST', $request->getMethod());
    $this->assertSame('https://chicken/v1/diseases', $request->getUri() . '');
    $this->assertSame($searchDocument, (string) $request->getBody());

    $this->assertTrue($request->hasHeader('Content-Type'));

    $contentType = $request->getHeader('Content-Type');
    $this->assertCount(1, $contentType);
    $this->assertSame('application/json', $contentType[0]);
  }

  /**
   * Test case for searchDiseasesByPost.
   *
   * Search Diseases by POST.
   */
  public function testSearchDiseasesByPost() {

    // Create the expected (successful) response.
    $response = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      '{"terms":[{"name":"ASPH-Positive Head and Neck Squamous Cell Carcinoma","codes":["C162770"],"ancestor_ids":["C35850"],"parent_ids":["C35850"],"type":["subtype"]},{"name":"Advanced Head and Neck Cancer","codes":["C129861"],"ancestor_ids":["C35850"],"parent_ids":["C35850"],"type":["subtype"]},{"name":"Advanced Head and Neck Squamous Cell Cancer","codes":["C139291"],"ancestor_ids":["C35850"],"parent_ids":["C35850"],"type":["subtype"]},{"name":"Cutaneous Squamous Cell Carcinoma of the Head and Neck","codes":["C133252"],"ancestor_ids":["C35850"],"parent_ids":["C35850"],"type":["subtype"]},{"name":"Head and Neck Basaloid Carcinoma","codes":["C37290"],"ancestor_ids":["C35850"],"parent_ids":["C35850"],"type":["subtype"]}]}'
    );

    $client = new MockClient([$response]);

    $apiInstance = new DiseasesApi($client->getClient());

    $searchDocument = '{"name":"Head"}';
    $diseaseList = $apiInstance->searchDiseasesByPost($searchDocument);

    // We expect a collection.
    $this->assertNotNull($diseaseList);

    $this->assertSame(5, count($diseaseList->Terms));

    $this->assertSame('NCIOCPL\ClinicalTrialSearch\Model\DiseaseCollection', get_class($diseaseList));

    $disease = $diseaseList->Terms[2];
    $this->assertSame('NCIOCPL\ClinicalTrialSearch\Model\Disease', get_class($disease));
    $this->assertSame('Advanced Head and Neck Squamous Cell Cancer', $disease->Name);

    $this->assertSame(1, count($disease->Codes));
    $this->assertSame('C139291', $disease->Codes[0]);

    $this->assertSame(1, count($disease->AncestorIDs));
    $this->assertSame('C35850', $disease->AncestorIDs[0]);

    $this->assertSame(1, count($disease->ParentID));
    $this->assertSame('C35850', $disease->ParentID[0]);

    $this->assertSame(1, count($disease->Type));
    $this->assertSame('subtype', $disease->Type[0]);

  }

  /**
   * Test searchDiseasesByPost for the case where no results are found.
   */
  public function testSearchDiseasesByPostNoResult() {

    // Create a response simulating what happens when there's no match.
    $noResultResponse = new Response(
      200,
      ['content-type' => 'application/json; charset=utf-8'],
      '{"terms":[]}'
    );

    $client = new MockClient([$noResultResponse]);

    $apiInstance = new DiseasesApi($client->getClient());

    // The search criteria don't matter since we're specify the response.
    $searchDocument = '{"current_trial_status": "turducken"}';
    $diseaseList = $apiInstance->searchDiseasesByPost($searchDocument);

    // Expect an empty collection.
    $this->assertNotNull($diseaseList);

    $this->assertSame('NCIOCPL\ClinicalTrialSearch\Model\DiseaseCollection', get_class($diseaseList));

    $this->assertSame(0, count($diseaseList->Terms));
  }

  /**
   * Error test searchDiseasesByPost for bad search document.
   */
  public function testSearchDiseasesByPostBadInput() {

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

    $apiInstance = new DiseasesApi($client->getClient());

    // The search criteria don't matter since we're specify the response.
    $searchDocument = '{"name": ';
    $termList = $apiInstance->searchDiseasesByPost($searchDocument);

    $this->assertNull($termList);
  }

}
