<?php

namespace NCIOCPL\ClinicalTrialSearch;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\HeaderSelector;
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ObjectSerializer;

/**
 * Wrapper for the  API to retrieve and search for clinical trials.
 */
class ClinicalTrialsApi implements ClinicalTrialsApiInterface {
  /**
   * Guzzle client.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $client;

  /**
   * Configuration.
   *
   * @var \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration
   */
  protected $config;

  /**
   * Header selector.
   *
   * @var \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\HeaderSelector
   */
  protected $headerSelector;

  /**
   * Constructor.
   *
   * @param \GuzzleHttp\ClientInterface $client
   *   A GuzzleHttp client.
   * @param \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration $config
   *   Configuration object (optional).
   * @param \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\HeaderSelector $selector
   *   The HeaderSelector object. (optional)
   */
  public function __construct(
        ClientInterface $client = NULL,
        Configuration $config = NULL,
        HeaderSelector $selector = NULL
    ) {
    $this->client = $client ?: new Client();
    $this->config = $config ?: new Configuration();
    $this->headerSelector = $selector ?: new HeaderSelector();
  }

  /**
   * Get the configuration object.
   *
   * @return \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration
   *   The configuration object.
   */
  public function getConfig() {
    return $this->config;
  }

  /**
   * Operation getTrialById.
   *
   * Get Trial.
   *
   * @param string $id
   *   NCI ID or NCT ID of Trial. (required)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return ClinicalTrial
   *   The matching trial.
   */
  public function getTrialById($id) {
    list($response) = $this->getTrialByIdWithHttpInfo($id);
    return $response;
  }

  /**
   * Operation getTrialByIdWithHttpInfo.
   *
   * Get Trial.
   *
   * @param string $id
   *   NCI ID or NCT ID of Trial. (required)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return array
   *   Of ClinicalTrial, HTTP status code, HTTP response headers
   *   (array of strings).
   */
  public function getTrialByIdWithHttpInfo($id) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\ClinicalTrial';
    $request = $this->getTrialByIdRequest($id);

    try {
      $options = $this->createHttpClientOption();
      try {
        $response = $this->client->send($request, $options);
      }
      catch (RequestException $e) {
        throw new ApiException(
              "[{$e->getCode()}] {$e->getMessage()}",
              $e->getCode(),
              $e->getResponse() ? $e->getResponse()->getHeaders() : NULL,
              $e->getResponse() ? $e->getResponse()->getBody()->getContents() : NULL
                );
      }

      $statusCode = $response->getStatusCode();

      if ($statusCode < 200 || $statusCode > 299) {
        throw new ApiException(
              sprintf(
                  '[%d] Error connecting to the API (%s)',
                  $statusCode,
                  $request->getUri()
              ),
              $statusCode,
              $response->getHeaders(),
              $response->getBody()
          );
      }

      $responseBody = $response->getBody();
      if ($returnType === '\SplFileObject') {
        // Stream goes to serializer.
        $content = $responseBody;
      }
      else {
        $content = $responseBody->getContents();
        if (!in_array($returnType, ['string', 'integer', 'bool'])) {
          $content = json_decode($content);
        }
      }

      return [
        ObjectSerializer::deserialize($content, $returnType, []),
        $response->getStatusCode(),
        $response->getHeaders(),
      ];

    }
    catch (ApiException $e) {
      switch ($e->getCode()) {
        case 200:
          $data = ObjectSerializer::deserialize(
            $e->getResponseBody(),
            '\Swagger\Client\Model\Resource',
            $e->getResponseHeaders()
          );
          $e->setResponseObject($data);
          break;
      }
      throw $e;
    }
  }

  /**
   * Operation getTrialByIdAsync.
   *
   * Get Trial.
   *
   * @param string $id
   *   NCI ID or NCT ID of Trial. (required)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise resolving to a ClinicalTrial object.
   */
  public function getTrialByIdAsync($id) {
    return $this->getTrialByIdAsyncWithHttpInfo($id)
      ->then(
              function ($response) {
                  return $response[0];
              }
          );
  }

  /**
   * Operation getTrialByIdAsyncWithHttpInfo.
   *
   * Get Trial.
   *
   * @param string $id
   *   NCI ID or NCT ID of Trial. (required)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise resolving to a ClinicalTrial object.
   */
  public function getTrialByIdAsyncWithHttpInfo($id) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\ClinicalTrial';
    $request = $this->getTrialByIdRequest($id);

    return $this->client
      ->sendAsync($request, $this->createHttpClientOption())
      ->then(
              function ($response) use ($returnType) {
                $responseBody = $response->getBody();
                if ($returnType === '\SplFileObject') {
                  // Stream goes to serializer.
                  $content = $responseBody;
                }
                else {
                  $content = $responseBody->getContents();
                  if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                  }
                }

                return [
                  ObjectSerializer::deserialize($content, $returnType, []),
                  $response->getStatusCode(),
                  $response->getHeaders(),
                ];
              },
              function ($exception) {
                  $response = $exception->getResponse();
                  $statusCode = $response->getStatusCode();
                  throw new ApiException(
                      sprintf(
                          '[%d] Error connecting to the API (%s)',
                          $statusCode,
                          $exception->getRequest()->getUri()
                      ),
                      $statusCode,
                      $response->getHeaders(),
                      $response->getBody()
                  );
              }
          );
  }

  /**
   * Create request for operation 'getTrialById'.
   *
   * @param string $id
   *   NCI ID or NCT ID of Trial. (required)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Psr7\Request
   *   The request to submit.
   */
  protected function getTrialByIdRequest($id) {
    // Verify the required parameter 'id' is set.
    if ($id === NULL || (is_array($id) && count($id) === 0)) {
      throw new \InvalidArgumentException(
            'Missing the required parameter $id when calling getTrialById'
        );
    }

    $resourcePath = '/v1/clinical-trial/{id}';
    $formParams = [];
    $queryParams = [];
    $headerParams = [];
    $httpBody = '';
    $multipart = FALSE;

    // Path params.
    if ($id !== NULL) {
      $resourcePath = str_replace(
            '{id}',
            ObjectSerializer::toPathValue($id),
            $resourcePath
        );
    }

    // Body params.
    $_tempBody = NULL;

    if ($multipart) {
      $headers = $this->headerSelector->selectHeadersForMultipart(
            []
        );
    }
    else {
      $headers = $this->headerSelector->selectHeaders(
            [],
            []
            );
    }

    // For model (json/xml)
    if (isset($_tempBody)) {
      // $_tempBody is the method argument, if present
      $httpBody = $_tempBody;
      // \stdClass has no __toString(), so we should encode it manually
      if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
      }
    }
    elseif (count($formParams) > 0) {
      if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
          $multipartContents[] = [
            'name' => $formParamName,
            'contents' => $formParamValue,
          ];
        }
        // For HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

      }
      elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

      }
      else {
        // For HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
      }
    }

    $defaultHeaders = [];
    if ($this->config->getUserAgent()) {
      $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
    }

    $headers = array_merge(
          $defaultHeaders,
          $headerParams,
          $headers
      );

    $query = \GuzzleHttp\Psr7\build_query($queryParams);
    return new Request(
          'GET',
          $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
          $headers,
          $httpBody
      );
  }

  /**
   * Operation searchTrialsByGet.
   *
   * Search Trials by GET.
   *
   * @param string $size
   *   Size of results. (optional)
   * @param string $from
   *   Starting from nth position of results lineup. (optional)
   * @param string $include
   *   Include only this attribute in trials and exclude others. (optional)
   * @param string $exclude
   *   Exclude only this attribute in trials and include others. (optional)
   * @param string $_fulltext
   *   Filter results by examining a variety of text-based fields. (optional)
   * @param string $sites_org_name_fulltext
   *   Filter results by examining words that make up organization name
   *   e.g &#x27;Mayo&#x27;. (optional)
   * @param string $_trialids
   *   Filter results by examining trial identifiers. (optional)
   * @param string $nci_id
   *   Search by NCI ID. (optional)
   * @param string $nct_id
   *   Search by NCT ID. (optional)
   * @param string $protocol_id
   *   Search by Protocol ID. (optional)
   * @param string $ccr_id
   *   Search by CCR ID. (optional)
   * @param string $ctep_id
   *   Search by CTEP ID (optional)
   * @param string $dcp_id
   *   Search by DCP ID (optional)
   * @param string $current_trial_status
   *   Current_trial_status (optional)
   * @param string $phase_phase
   *   Phase_phase (optional)
   * @param string $study_protocol_type
   *   Study_protocol_type (optional)
   * @param string $brief_title
   *   Brief_title (optional)
   * @param string $brief_summary
   *   Brief_summary (optional)
   * @param string $official_title
   *   Official_title (optional)
   * @param string $primary_purpose_primary_purpose_code
   *   Primary_purpose_primary_purpose_code (optional)
   * @param string $accepts_healthy_volunteers_indicator
   *   Accepts_healthy_volunteers_indicator (optional)
   * @param string $acronym
   *   Acronym (optional)
   * @param string $amendment_date
   *   Amendment_date (optional)
   * @param string $anatomic_sites
   *   Anatomic_sites (optional)
   * @param string $arms_arm_description
   *   Arms_arm_description (optional)
   * @param string $arms_arm_name
   *   Arms_arm_name (optional)
   * @param string $arms_arm_type
   *   Arms_arm_type (optional)
   * @param string $arms_interventions_intervention_code
   *   Arms_interventions_intervention_code (optional)
   * @param string $arms_interventions_intervention_description
   *   Arms_interventions_intervention_description (optional)
   * @param string $arms_interventions_intervention_name
   *   Arms_interventions_intervention_name (optional)
   * @param string $arms_interventions_intervention_type
   *   Arms_interventions_intervention_type (optional)
   * @param string $arms_interventions_synonyms
   *   Arms_interventions_synonyms (optional)
   * @param string $associated_studies_study_id
   *   Associated_studies_study_id (optional)
   * @param string $associated_studies_study_id_type
   *   Associated_studies_study_id_type (optional)
   * @param string $eligibility_structured_gender
   *   Eligibility_structured_gender (optional)
   * @param string $eligibility_structured_max_age_in_years_lte
   *   Eligibility_structured_max_age_in_years_lte (optional)
   * @param string $eligibility_structured_max_age_in_years_gte
   *   Eligibility_structured_max_age_in_years_gte (optional)
   * @param string $eligibility_structured_min_age_in_years_lte
   *   Eligibility_structured_min_age_in_years_lte (optional)
   * @param string $eligibility_structured_min_age_in_years_gte
   *   Eligibility_structured_min_age_in_years_gte (optional)
   * @param string $eligibility_structured_min_age_unit
   *   Eligibility_structured_min_age_unit (optional)
   * @param string $eligibility_structured_max_age_unit
   *   Eligibility_structured_max_age_unit (optional)
   * @param string $eligibility_structured_max_age_number_lte
   *   Eligibility_structured_max_age_number_lte (optional)
   * @param string $eligibility_structured_max_age_number_gte
   *   Eligibility_structured_max_age_number_gte (optional)
   * @param string $eligibility_structured_min_age_number_lte
   *   Eligibility_structured_min_age_number_lte (optional)
   * @param string $eligibility_structured_min_age_number_gte
   *   Eligibility_structured_min_age_number_gte (optional)
   * @param string $current_trial_status_date_lte
   *   Current_trial_status_date_lte (optional)
   * @param string $current_trial_status_date_gte
   *   Current_trial_status_date_gte (optional)
   * @param string $record_verification_date_lte
   *   Record_verification_date_lte (optional)
   * @param string $record_verification_date_gte
   *   Record_verification_date_gte (optional)
   * @param string $sites_org_coordinates_lat
   *   Sites_org_coordinates_lat (optional)
   * @param string $sites_org_coordinates_lon
   *   Sites_org_coordinates_lon (optional)
   * @param string $sites_org_coordinates_dist
   *   Sites_org_coordinates_dist (optional)
   * @param string $sites_contact_email
   *   Sites_contact_email (optional)
   * @param string $sites_contact_name
   *   Sites_contact_name (optional)
   * @param string $sites_contact_name__auto
   *   Sites_contact_name__auto (optional)
   * @param string $sites_contact_name__raw
   *   Sites_contact_name__raw (optional)
   * @param string $sites_contact_phone
   *   Sites_contact_phone (optional)
   * @param string $sites_generic_contact
   *   Sites_generic_contact (optional)
   * @param string $sites_org_address_line_1
   *   Sites_org_address_line_1 (optional)
   * @param string $sites_org_address_line_2
   *   Sites_org_address_line_2 (optional)
   * @param string $sites_org_city
   *   Sites_org_city (optional)
   * @param string $sites_org_postal_code
   *   Sites_org_postal_code (optional)
   * @param string $sites_org_state_or_province
   *   Sites_org_state_or_province (optional)
   * @param string $sites_org_country
   *   Sites_org_country (optional)
   * @param string $sites_org_country__raw
   *   Sites_org_country__raw (optional)
   * @param string $sites_org_email
   *   Sites_org_email (optional)
   * @param string $sites_org_family
   *   Sites_org_family (optional)
   * @param string $sites_org_fax
   *   Sites_org_fax (optional)
   * @param string $sites_org_name
   *   Sites_org_name (optional)
   * @param string $sites_org_name__auto
   *   Sites_org_name__auto (optional)
   * @param string $sites_org_name__raw
   *   Sites_org_name__raw (optional)
   * @param string $sites_org_phone
   *   Sites_org_phone (optional)
   * @param string $sites_org_status
   *   Sites_org_status (optional)
   * @param string $sites_org_status_date
   *   Sites_org_status_date (optional)
   * @param string $sites_org_to_family_relationship
   *   Sites_org_to_family_relationship (optional)
   * @param string $sites_org_tty
   *   Sites_org_tty (optional)
   * @param string $sites_recruitment_status
   *   Sites_recruitment_status (optional)
   * @param string $sites_recruitment_status_date
   *   Sites_recruitment_status_date (optional)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return ClinicalTrialsCollection
   *   A collection of matching clinical trials.
   */
  public function searchTrialsByGet($size = NULL, $from = NULL, $include = NULL, $exclude = NULL, $_fulltext = NULL, $sites_org_name_fulltext = NULL, $_trialids = NULL, $nci_id = NULL, $nct_id = NULL, $protocol_id = NULL, $ccr_id = NULL, $ctep_id = NULL, $dcp_id = NULL, $current_trial_status = NULL, $phase_phase = NULL, $study_protocol_type = NULL, $brief_title = NULL, $brief_summary = NULL, $official_title = NULL, $primary_purpose_primary_purpose_code = NULL, $accepts_healthy_volunteers_indicator = NULL, $acronym = NULL, $amendment_date = NULL, $anatomic_sites = NULL, $arms_arm_description = NULL, $arms_arm_name = NULL, $arms_arm_type = NULL, $arms_interventions_intervention_code = NULL, $arms_interventions_intervention_description = NULL, $arms_interventions_intervention_name = NULL, $arms_interventions_intervention_type = NULL, $arms_interventions_synonyms = NULL, $associated_studies_study_id = NULL, $associated_studies_study_id_type = NULL, $eligibility_structured_gender = NULL, $eligibility_structured_max_age_in_years_lte = NULL, $eligibility_structured_max_age_in_years_gte = NULL, $eligibility_structured_min_age_in_years_lte = NULL, $eligibility_structured_min_age_in_years_gte = NULL, $eligibility_structured_min_age_unit = NULL, $eligibility_structured_max_age_unit = NULL, $eligibility_structured_max_age_number_lte = NULL, $eligibility_structured_max_age_number_gte = NULL, $eligibility_structured_min_age_number_lte = NULL, $eligibility_structured_min_age_number_gte = NULL, $current_trial_status_date_lte = NULL, $current_trial_status_date_gte = NULL, $record_verification_date_lte = NULL, $record_verification_date_gte = NULL, $sites_org_coordinates_lat = NULL, $sites_org_coordinates_lon = NULL, $sites_org_coordinates_dist = NULL, $sites_contact_email = NULL, $sites_contact_name = NULL, $sites_contact_name__auto = NULL, $sites_contact_name__raw = NULL, $sites_contact_phone = NULL, $sites_generic_contact = NULL, $sites_org_address_line_1 = NULL, $sites_org_address_line_2 = NULL, $sites_org_city = NULL, $sites_org_postal_code = NULL, $sites_org_state_or_province = NULL, $sites_org_country = NULL, $sites_org_country__raw = NULL, $sites_org_email = NULL, $sites_org_family = NULL, $sites_org_fax = NULL, $sites_org_name = NULL, $sites_org_name__auto = NULL, $sites_org_name__raw = NULL, $sites_org_phone = NULL, $sites_org_status = NULL, $sites_org_status_date = NULL, $sites_org_to_family_relationship = NULL, $sites_org_tty = NULL, $sites_recruitment_status = NULL, $sites_recruitment_status_date = NULL) {
    list($response) = $this->searchTrialsByGetWithHttpInfo($size, $from, $include, $exclude, $_fulltext, $sites_org_name_fulltext, $_trialids, $nci_id, $nct_id, $protocol_id, $ccr_id, $ctep_id, $dcp_id, $current_trial_status, $phase_phase, $study_protocol_type, $brief_title, $brief_summary, $official_title, $primary_purpose_primary_purpose_code, $accepts_healthy_volunteers_indicator, $acronym, $amendment_date, $anatomic_sites, $arms_arm_description, $arms_arm_name, $arms_arm_type, $arms_interventions_intervention_code, $arms_interventions_intervention_description, $arms_interventions_intervention_name, $arms_interventions_intervention_type, $arms_interventions_synonyms, $associated_studies_study_id, $associated_studies_study_id_type, $eligibility_structured_gender, $eligibility_structured_max_age_in_years_lte, $eligibility_structured_max_age_in_years_gte, $eligibility_structured_min_age_in_years_lte, $eligibility_structured_min_age_in_years_gte, $eligibility_structured_min_age_unit, $eligibility_structured_max_age_unit, $eligibility_structured_max_age_number_lte, $eligibility_structured_max_age_number_gte, $eligibility_structured_min_age_number_lte, $eligibility_structured_min_age_number_gte, $current_trial_status_date_lte, $current_trial_status_date_gte, $record_verification_date_lte, $record_verification_date_gte, $sites_org_coordinates_lat, $sites_org_coordinates_lon, $sites_org_coordinates_dist, $sites_contact_email, $sites_contact_name, $sites_contact_name__auto, $sites_contact_name__raw, $sites_contact_phone, $sites_generic_contact, $sites_org_address_line_1, $sites_org_address_line_2, $sites_org_city, $sites_org_postal_code, $sites_org_state_or_province, $sites_org_country, $sites_org_country__raw, $sites_org_email, $sites_org_family, $sites_org_fax, $sites_org_name, $sites_org_name__auto, $sites_org_name__raw, $sites_org_phone, $sites_org_status, $sites_org_status_date, $sites_org_to_family_relationship, $sites_org_tty, $sites_recruitment_status, $sites_recruitment_status_date);
    return $response;
  }

  /**
   * Operation searchTrialsByGetWithHttpInfo.
   *
   * Search Trials by GET.
   *
   * @param string $size
   *   Size of results. (optional)
   * @param string $from
   *   Starting from nth position of results lineup. (optional)
   * @param string $include
   *   Include only this attribute in trials and exclude others. (optional)
   * @param string $exclude
   *   Exclude only this attribute in trials and include others. (optional)
   * @param string $_fulltext
   *   Filter results by examining a variety of text-based fields. (optional)
   * @param string $sites_org_name_fulltext
   *   Filter results by examining words that make up organization name
   *   e.g &#x27;Mayo&#x27;. (optional)
   * @param string $_trialids
   *   Filter results by examining trial identifiers. (optional)
   * @param string $nci_id
   *   Search by NCI ID. (optional)
   * @param string $nct_id
   *   Search by NCT ID. (optional)
   * @param string $protocol_id
   *   Search by Protocol ID. (optional)
   * @param string $ccr_id
   *   Search by CCR ID. (optional)
   * @param string $ctep_id
   *   Search by CTEP ID (optional)
   * @param string $dcp_id
   *   Search by DCP ID (optional)
   * @param string $current_trial_status
   *   (Optional)
   * @param string $phase_phase
   *   (Optional)
   * @param string $study_protocol_type
   *   (Optional)
   * @param string $brief_title
   *   (Optional)
   * @param string $brief_summary
   *   (Optional)
   * @param string $official_title
   *   (Optional)
   * @param string $primary_purpose_primary_purpose_code
   *   (Optional)
   * @param string $accepts_healthy_volunteers_indicator
   *   (Optional)
   * @param string $acronym
   *   (Optional)
   * @param string $amendment_date
   *   (Optional)
   * @param string $anatomic_sites
   *   (Optional)
   * @param string $arms_arm_description
   *   (Optional)
   * @param string $arms_arm_name
   *   (Optional)
   * @param string $arms_arm_type
   *   (Optional)
   * @param string $arms_interventions_intervention_code
   *   (Optional)
   * @param string $arms_interventions_intervention_description
   *   (Optional)
   * @param string $arms_interventions_intervention_name
   *   (Optional)
   * @param string $arms_interventions_intervention_type
   *   (Optional)
   * @param string $arms_interventions_synonyms
   *   (Optional)
   * @param string $associated_studies_study_id
   *   (Optional)
   * @param string $associated_studies_study_id_type
   *   (Optional)
   * @param string $eligibility_structured_gender
   *   (Optional)
   * @param string $eligibility_structured_max_age_in_years_lte
   *   (Optional)
   * @param string $eligibility_structured_max_age_in_years_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_in_years_lte
   *   (Optional)
   * @param string $eligibility_structured_min_age_in_years_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_unit
   *   (Optional)
   * @param string $eligibility_structured_max_age_unit
   *   (Optional)
   * @param string $eligibility_structured_max_age_number_lte
   *   (Optional)
   * @param string $eligibility_structured_max_age_number_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_number_lte
   *   (Optional)
   * @param string $eligibility_structured_min_age_number_gte
   *   (Optional)
   * @param string $current_trial_status_date_lte
   *   (Optional)
   * @param string $current_trial_status_date_gte
   *   (Optional)
   * @param string $record_verification_date_lte
   *   (Optional)
   * @param string $record_verification_date_gte
   *   (Optional)
   * @param string $sites_org_coordinates_lat
   *   (Optional)
   * @param string $sites_org_coordinates_lon
   *   (Optional)
   * @param string $sites_org_coordinates_dist
   *   (Optional)
   * @param string $sites_contact_email
   *   (Optional)
   * @param string $sites_contact_name
   *   (Optional)
   * @param string $sites_contact_name__auto
   *   (Optional)
   * @param string $sites_contact_name__raw
   *   (Optional)
   * @param string $sites_contact_phone
   *   (Optional)
   * @param string $sites_generic_contact
   *   (Optional)
   * @param string $sites_org_address_line_1
   *   (Optional)
   * @param string $sites_org_address_line_2
   *   (Optional)
   * @param string $sites_org_city
   *   (Optional)
   * @param string $sites_org_postal_code
   *   (Optional)
   * @param string $sites_org_state_or_province
   *   (Optional)
   * @param string $sites_org_country
   *   (Optional)
   * @param string $sites_org_country__raw
   *   (Optional)
   * @param string $sites_org_email
   *   (Optional)
   * @param string $sites_org_family
   *   (Optional)
   * @param string $sites_org_fax
   *   (Optional)
   * @param string $sites_org_name
   *   (Optional)
   * @param string $sites_org_name__auto
   *   (Optional)
   * @param string $sites_org_name__raw
   *   (Optional)
   * @param string $sites_org_phone
   *   (Optional)
   * @param string $sites_org_status
   *   (Optional)
   * @param string $sites_org_status_date
   *   (Optional)
   * @param string $sites_org_to_family_relationship
   *   (Optional)
   * @param string $sites_org_tty
   *   (Optional)
   * @param string $sites_recruitment_status
   *   (Optional)
   * @param string $sites_recruitment_status_date
   *   (Optional)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return array
   *   ClinicalTrialsCollection, HTTP status code, HTTP response headers
   *   (array of strings).
   */
  public function searchTrialsByGetWithHttpInfo($size = NULL, $from = NULL, $include = NULL, $exclude = NULL, $_fulltext = NULL, $sites_org_name_fulltext = NULL, $_trialids = NULL, $nci_id = NULL, $nct_id = NULL, $protocol_id = NULL, $ccr_id = NULL, $ctep_id = NULL, $dcp_id = NULL, $current_trial_status = NULL, $phase_phase = NULL, $study_protocol_type = NULL, $brief_title = NULL, $brief_summary = NULL, $official_title = NULL, $primary_purpose_primary_purpose_code = NULL, $accepts_healthy_volunteers_indicator = NULL, $acronym = NULL, $amendment_date = NULL, $anatomic_sites = NULL, $arms_arm_description = NULL, $arms_arm_name = NULL, $arms_arm_type = NULL, $arms_interventions_intervention_code = NULL, $arms_interventions_intervention_description = NULL, $arms_interventions_intervention_name = NULL, $arms_interventions_intervention_type = NULL, $arms_interventions_synonyms = NULL, $associated_studies_study_id = NULL, $associated_studies_study_id_type = NULL, $eligibility_structured_gender = NULL, $eligibility_structured_max_age_in_years_lte = NULL, $eligibility_structured_max_age_in_years_gte = NULL, $eligibility_structured_min_age_in_years_lte = NULL, $eligibility_structured_min_age_in_years_gte = NULL, $eligibility_structured_min_age_unit = NULL, $eligibility_structured_max_age_unit = NULL, $eligibility_structured_max_age_number_lte = NULL, $eligibility_structured_max_age_number_gte = NULL, $eligibility_structured_min_age_number_lte = NULL, $eligibility_structured_min_age_number_gte = NULL, $current_trial_status_date_lte = NULL, $current_trial_status_date_gte = NULL, $record_verification_date_lte = NULL, $record_verification_date_gte = NULL, $sites_org_coordinates_lat = NULL, $sites_org_coordinates_lon = NULL, $sites_org_coordinates_dist = NULL, $sites_contact_email = NULL, $sites_contact_name = NULL, $sites_contact_name__auto = NULL, $sites_contact_name__raw = NULL, $sites_contact_phone = NULL, $sites_generic_contact = NULL, $sites_org_address_line_1 = NULL, $sites_org_address_line_2 = NULL, $sites_org_city = NULL, $sites_org_postal_code = NULL, $sites_org_state_or_province = NULL, $sites_org_country = NULL, $sites_org_country__raw = NULL, $sites_org_email = NULL, $sites_org_family = NULL, $sites_org_fax = NULL, $sites_org_name = NULL, $sites_org_name__auto = NULL, $sites_org_name__raw = NULL, $sites_org_phone = NULL, $sites_org_status = NULL, $sites_org_status_date = NULL, $sites_org_to_family_relationship = NULL, $sites_org_tty = NULL, $sites_recruitment_status = NULL, $sites_recruitment_status_date = NULL) {

    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\ClinicalTrialsCollection';
    $request = $this->searchTrialsByGetRequest($size, $from, $include, $exclude, $_fulltext, $sites_org_name_fulltext, $_trialids, $nci_id, $nct_id, $protocol_id, $ccr_id, $ctep_id, $dcp_id, $current_trial_status, $phase_phase, $study_protocol_type, $brief_title, $brief_summary, $official_title, $primary_purpose_primary_purpose_code, $accepts_healthy_volunteers_indicator, $acronym, $amendment_date, $anatomic_sites, $arms_arm_description, $arms_arm_name, $arms_arm_type, $arms_interventions_intervention_code, $arms_interventions_intervention_description, $arms_interventions_intervention_name, $arms_interventions_intervention_type, $arms_interventions_synonyms, $associated_studies_study_id, $associated_studies_study_id_type, $eligibility_structured_gender, $eligibility_structured_max_age_in_years_lte, $eligibility_structured_max_age_in_years_gte, $eligibility_structured_min_age_in_years_lte, $eligibility_structured_min_age_in_years_gte, $eligibility_structured_min_age_unit, $eligibility_structured_max_age_unit, $eligibility_structured_max_age_number_lte, $eligibility_structured_max_age_number_gte, $eligibility_structured_min_age_number_lte, $eligibility_structured_min_age_number_gte, $current_trial_status_date_lte, $current_trial_status_date_gte, $record_verification_date_lte, $record_verification_date_gte, $sites_org_coordinates_lat, $sites_org_coordinates_lon, $sites_org_coordinates_dist, $sites_contact_email, $sites_contact_name, $sites_contact_name__auto, $sites_contact_name__raw, $sites_contact_phone, $sites_generic_contact, $sites_org_address_line_1, $sites_org_address_line_2, $sites_org_city, $sites_org_postal_code, $sites_org_state_or_province, $sites_org_country, $sites_org_country__raw, $sites_org_email, $sites_org_family, $sites_org_fax, $sites_org_name, $sites_org_name__auto, $sites_org_name__raw, $sites_org_phone, $sites_org_status, $sites_org_status_date, $sites_org_to_family_relationship, $sites_org_tty, $sites_recruitment_status, $sites_recruitment_status_date);

    try {
      $options = $this->createHttpClientOption();
      try {
        $response = $this->client->send($request, $options);
      }
      catch (RequestException $e) {
        throw new ApiException(
              "[{$e->getCode()}] {$e->getMessage()}",
              $e->getCode(),
              $e->getResponse() ? $e->getResponse()->getHeaders() : NULL,
              $e->getResponse() ? $e->getResponse()->getBody()->getContents() : NULL
                );
      }

      $statusCode = $response->getStatusCode();

      if ($statusCode < 200 || $statusCode > 299) {
        throw new ApiException(
              sprintf(
                  '[%d] Error connecting to the API (%s)',
                  $statusCode,
                  $request->getUri()
              ),
              $statusCode,
              $response->getHeaders(),
              $response->getBody()
          );
      }

      $responseBody = $response->getBody();
      if ($returnType === '\SplFileObject') {
        // Stream goes to serializer.
        $content = $responseBody;
      }
      else {
        $content = $responseBody->getContents();
        if (!in_array($returnType, ['string', 'integer', 'bool'])) {
          $content = json_decode($content);
        }
      }

      return [
        ObjectSerializer::deserialize($content, $returnType, []),
        $response->getStatusCode(),
        $response->getHeaders(),
      ];

    }
    catch (ApiException $e) {
      switch ($e->getCode()) {
        case 200:
          $data = ObjectSerializer::deserialize(
            $e->getResponseBody(),
            '\Swagger\Client\Model\Resource',
            $e->getResponseHeaders()
          );
          $e->setResponseObject($data);
          break;
      }
      throw $e;
    }
  }

  /**
   * Operation searchTrialsByGetAsync.
   *
   * Search Trials by GET.
   *
   * @param string $size
   *   Size of results. (optional)
   * @param string $from
   *   Starting from nth position of results lineup. (optional)
   * @param string $include
   *   Include only this attribute in trials and exclude others. (optional)
   * @param string $exclude
   *   Exclude only this attribute in trials and include others. (optional)
   * @param string $_fulltext
   *   Filter results by examining a variety of text-based fields. (optional)
   * @param string $sites_org_name_fulltext
   *   Filter results by examining words that make up organization name
   *   e.g &#x27;Mayo&#x27;. (optional)
   * @param string $_trialids
   *   Filter results by examining trial identifiers. (optional)
   * @param string $nci_id
   *   Search by NCI ID. (optional)
   * @param string $nct_id
   *   Search by NCT ID. (optional)
   * @param string $protocol_id
   *   Search by Protocol ID. (optional)
   * @param string $ccr_id
   *   Search by CCR ID. (optional)
   * @param string $ctep_id
   *   Search by CTEP ID (optional)
   * @param string $dcp_id
   *   Search by DCP ID (optional)
   * @param string $current_trial_status
   *   (Optional)
   * @param string $phase_phase
   *   (Optional)
   * @param string $study_protocol_type
   *   (Optional)
   * @param string $brief_title
   *   (Optional)
   * @param string $brief_summary
   *   (Optional)
   * @param string $official_title
   *   (Optional)
   * @param string $primary_purpose_primary_purpose_code
   *   (Optional)
   * @param string $accepts_healthy_volunteers_indicator
   *   (Optional)
   * @param string $acronym
   *   (Optional)
   * @param string $amendment_date
   *   (Optional)
   * @param string $anatomic_sites
   *   (Optional)
   * @param string $arms_arm_description
   *   (Optional)
   * @param string $arms_arm_name
   *   (Optional)
   * @param string $arms_arm_type
   *   (Optional)
   * @param string $arms_interventions_intervention_code
   *   (Optional)
   * @param string $arms_interventions_intervention_description
   *   (Optional)
   * @param string $arms_interventions_intervention_name
   *   (Optional)
   * @param string $arms_interventions_intervention_type
   *   (Optional)
   * @param string $arms_interventions_synonyms
   *   (Optional)
   * @param string $associated_studies_study_id
   *   (Optional)
   * @param string $associated_studies_study_id_type
   *   (Optional)
   * @param string $eligibility_structured_gender
   *   (Optional)
   * @param string $eligibility_structured_max_age_in_years_lte
   *   (Optional)
   * @param string $eligibility_structured_max_age_in_years_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_in_years_lte
   *   (Optional)
   * @param string $eligibility_structured_min_age_in_years_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_unit
   *   (Optional)
   * @param string $eligibility_structured_max_age_unit
   *   (Optional)
   * @param string $eligibility_structured_max_age_number_lte
   *   (Optional)
   * @param string $eligibility_structured_max_age_number_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_number_lte
   *   (Optional)
   * @param string $eligibility_structured_min_age_number_gte
   *   (Optional)
   * @param string $current_trial_status_date_lte
   *   (Optional)
   * @param string $current_trial_status_date_gte
   *   (Optional)
   * @param string $record_verification_date_lte
   *   (Optional)
   * @param string $record_verification_date_gte
   *   (Optional)
   * @param string $sites_org_coordinates_lat
   *   (Optional)
   * @param string $sites_org_coordinates_lon
   *   (Optional)
   * @param string $sites_org_coordinates_dist
   *   (Optional)
   * @param string $sites_contact_email
   *   (Optional)
   * @param string $sites_contact_name
   *   (Optional)
   * @param string $sites_contact_name__auto
   *   (Optional)
   * @param string $sites_contact_name__raw
   *   (Optional)
   * @param string $sites_contact_phone
   *   (Optional)
   * @param string $sites_generic_contact
   *   (Optional)
   * @param string $sites_org_address_line_1
   *   (Optional)
   * @param string $sites_org_address_line_2
   *   (Optional)
   * @param string $sites_org_city
   *   (Optional)
   * @param string $sites_org_postal_code
   *   (Optional)
   * @param string $sites_org_state_or_province
   *   (Optional)
   * @param string $sites_org_country
   *   (Optional)
   * @param string $sites_org_country__raw
   *   (Optional)
   * @param string $sites_org_email
   *   (Optional)
   * @param string $sites_org_family
   *   (Optional)
   * @param string $sites_org_fax
   *   (Optional)
   * @param string $sites_org_name
   *   (Optional)
   * @param string $sites_org_name__auto
   *   (Optional)
   * @param string $sites_org_name__raw
   *   (Optional)
   * @param string $sites_org_phone
   *   (Optional)
   * @param string $sites_org_status
   *   (Optional)
   * @param string $sites_org_status_date
   *   (Optional)
   * @param string $sites_org_to_family_relationship
   *   (Optional)
   * @param string $sites_org_tty
   *   (Optional)
   * @param string $sites_recruitment_status
   *   (Optional)
   * @param string $sites_recruitment_status_date
   *   (Optional)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise resolving to a ClinicalTrialsCollection.
   */
  public function searchTrialsByGetAsync($size = NULL, $from = NULL, $include = NULL, $exclude = NULL, $_fulltext = NULL, $sites_org_name_fulltext = NULL, $_trialids = NULL, $nci_id = NULL, $nct_id = NULL, $protocol_id = NULL, $ccr_id = NULL, $ctep_id = NULL, $dcp_id = NULL, $current_trial_status = NULL, $phase_phase = NULL, $study_protocol_type = NULL, $brief_title = NULL, $brief_summary = NULL, $official_title = NULL, $primary_purpose_primary_purpose_code = NULL, $accepts_healthy_volunteers_indicator = NULL, $acronym = NULL, $amendment_date = NULL, $anatomic_sites = NULL, $arms_arm_description = NULL, $arms_arm_name = NULL, $arms_arm_type = NULL, $arms_interventions_intervention_code = NULL, $arms_interventions_intervention_description = NULL, $arms_interventions_intervention_name = NULL, $arms_interventions_intervention_type = NULL, $arms_interventions_synonyms = NULL, $associated_studies_study_id = NULL, $associated_studies_study_id_type = NULL, $eligibility_structured_gender = NULL, $eligibility_structured_max_age_in_years_lte = NULL, $eligibility_structured_max_age_in_years_gte = NULL, $eligibility_structured_min_age_in_years_lte = NULL, $eligibility_structured_min_age_in_years_gte = NULL, $eligibility_structured_min_age_unit = NULL, $eligibility_structured_max_age_unit = NULL, $eligibility_structured_max_age_number_lte = NULL, $eligibility_structured_max_age_number_gte = NULL, $eligibility_structured_min_age_number_lte = NULL, $eligibility_structured_min_age_number_gte = NULL, $current_trial_status_date_lte = NULL, $current_trial_status_date_gte = NULL, $record_verification_date_lte = NULL, $record_verification_date_gte = NULL, $sites_org_coordinates_lat = NULL, $sites_org_coordinates_lon = NULL, $sites_org_coordinates_dist = NULL, $sites_contact_email = NULL, $sites_contact_name = NULL, $sites_contact_name__auto = NULL, $sites_contact_name__raw = NULL, $sites_contact_phone = NULL, $sites_generic_contact = NULL, $sites_org_address_line_1 = NULL, $sites_org_address_line_2 = NULL, $sites_org_city = NULL, $sites_org_postal_code = NULL, $sites_org_state_or_province = NULL, $sites_org_country = NULL, $sites_org_country__raw = NULL, $sites_org_email = NULL, $sites_org_family = NULL, $sites_org_fax = NULL, $sites_org_name = NULL, $sites_org_name__auto = NULL, $sites_org_name__raw = NULL, $sites_org_phone = NULL, $sites_org_status = NULL, $sites_org_status_date = NULL, $sites_org_to_family_relationship = NULL, $sites_org_tty = NULL, $sites_recruitment_status = NULL, $sites_recruitment_status_date = NULL) {
    return $this->searchTrialsByGetAsyncWithHttpInfo($size, $from, $include, $exclude, $_fulltext, $sites_org_name_fulltext, $_trialids, $nci_id, $nct_id, $protocol_id, $ccr_id, $ctep_id, $dcp_id, $current_trial_status, $phase_phase, $study_protocol_type, $brief_title, $brief_summary, $official_title, $primary_purpose_primary_purpose_code, $accepts_healthy_volunteers_indicator, $acronym, $amendment_date, $anatomic_sites, $arms_arm_description, $arms_arm_name, $arms_arm_type, $arms_interventions_intervention_code, $arms_interventions_intervention_description, $arms_interventions_intervention_name, $arms_interventions_intervention_type, $arms_interventions_synonyms, $associated_studies_study_id, $associated_studies_study_id_type, $eligibility_structured_gender, $eligibility_structured_max_age_in_years_lte, $eligibility_structured_max_age_in_years_gte, $eligibility_structured_min_age_in_years_lte, $eligibility_structured_min_age_in_years_gte, $eligibility_structured_min_age_unit, $eligibility_structured_max_age_unit, $eligibility_structured_max_age_number_lte, $eligibility_structured_max_age_number_gte, $eligibility_structured_min_age_number_lte, $eligibility_structured_min_age_number_gte, $current_trial_status_date_lte, $current_trial_status_date_gte, $record_verification_date_lte, $record_verification_date_gte, $sites_org_coordinates_lat, $sites_org_coordinates_lon, $sites_org_coordinates_dist, $sites_contact_email, $sites_contact_name, $sites_contact_name__auto, $sites_contact_name__raw, $sites_contact_phone, $sites_generic_contact, $sites_org_address_line_1, $sites_org_address_line_2, $sites_org_city, $sites_org_postal_code, $sites_org_state_or_province, $sites_org_country, $sites_org_country__raw, $sites_org_email, $sites_org_family, $sites_org_fax, $sites_org_name, $sites_org_name__auto, $sites_org_name__raw, $sites_org_phone, $sites_org_status, $sites_org_status_date, $sites_org_to_family_relationship, $sites_org_tty, $sites_recruitment_status, $sites_recruitment_status_date)
      ->then(
              function ($response) {
                  return $response[0];
              }
          );
  }

  /**
   * Operation searchTrialsByGetAsyncWithHttpInfo.
   *
   * Search Trials by GET.
   *
   * @param string $size
   *   Size of results. (optional)
   * @param string $from
   *   Starting from nth position of results lineup. (optional)
   * @param string $include
   *   Include only this attribute in trials and exclude others. (optional)
   * @param string $exclude
   *   Exclude only this attribute in trials and include others. (optional)
   * @param string $_fulltext
   *   Filter results by examining a variety of text-based fields. (optional)
   * @param string $sites_org_name_fulltext
   *   Filter results by examining words that make up organization name
   *   e.g &#x27;Mayo&#x27;. (optional)
   * @param string $_trialids
   *   Filter results by examining trial identifiers. (optional)
   * @param string $nci_id
   *   Search by NCI ID. (optional)
   * @param string $nct_id
   *   Search by NCT ID. (optional)
   * @param string $protocol_id
   *   Search by Protocol ID. (optional)
   * @param string $ccr_id
   *   Search by CCR ID. (optional)
   * @param string $ctep_id
   *   Search by CTEP ID (optional)
   * @param string $dcp_id
   *   Search by DCP ID (optional)
   * @param string $current_trial_status
   *   (Optional)
   * @param string $phase_phase
   *   (Optional)
   * @param string $study_protocol_type
   *   (Optional)
   * @param string $brief_title
   *   (Optional)
   * @param string $brief_summary
   *   (Optional)
   * @param string $official_title
   *   (Optional)
   * @param string $primary_purpose_primary_purpose_code
   *   (Optional)
   * @param string $accepts_healthy_volunteers_indicator
   *   (Optional)
   * @param string $acronym
   *   (Optional)
   * @param string $amendment_date
   *   (Optional)
   * @param string $anatomic_sites
   *   (Optional)
   * @param string $arms_arm_description
   *   (Optional)
   * @param string $arms_arm_name
   *   (Optional)
   * @param string $arms_arm_type
   *   (Optional)
   * @param string $arms_interventions_intervention_code
   *   (Optional)
   * @param string $arms_interventions_intervention_description
   *   (Optional)
   * @param string $arms_interventions_intervention_name
   *   (Optional)
   * @param string $arms_interventions_intervention_type
   *   (Optional)
   * @param string $arms_interventions_synonyms
   *   (Optional)
   * @param string $associated_studies_study_id
   *   (Optional)
   * @param string $associated_studies_study_id_type
   *   (Optional)
   * @param string $eligibility_structured_gender
   *   (Optional)
   * @param string $eligibility_structured_max_age_in_years_lte
   *   (Optional)
   * @param string $eligibility_structured_max_age_in_years_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_in_years_lte
   *   (Optional)
   * @param string $eligibility_structured_min_age_in_years_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_unit
   *   (Optional)
   * @param string $eligibility_structured_max_age_unit
   *   (Optional)
   * @param string $eligibility_structured_max_age_number_lte
   *   (Optional)
   * @param string $eligibility_structured_max_age_number_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_number_lte
   *   (Optional)
   * @param string $eligibility_structured_min_age_number_gte
   *   (Optional)
   * @param string $current_trial_status_date_lte
   *   (Optional)
   * @param string $current_trial_status_date_gte
   *   (Optional)
   * @param string $record_verification_date_lte
   *   (Optional)
   * @param string $record_verification_date_gte
   *   (Optional)
   * @param string $sites_org_coordinates_lat
   *   (Optional)
   * @param string $sites_org_coordinates_lon
   *   (Optional)
   * @param string $sites_org_coordinates_dist
   *   (Optional)
   * @param string $sites_contact_email
   *   (Optional)
   * @param string $sites_contact_name
   *   (Optional)
   * @param string $sites_contact_name__auto
   *   (Optional)
   * @param string $sites_contact_name__raw
   *   (Optional)
   * @param string $sites_contact_phone
   *   (Optional)
   * @param string $sites_generic_contact
   *   (Optional)
   * @param string $sites_org_address_line_1
   *   (Optional)
   * @param string $sites_org_address_line_2
   *   (Optional)
   * @param string $sites_org_city
   *   (Optional)
   * @param string $sites_org_postal_code
   *   (Optional)
   * @param string $sites_org_state_or_province
   *   (Optional)
   * @param string $sites_org_country
   *   (Optional)
   * @param string $sites_org_country__raw
   *   (Optional)
   * @param string $sites_org_email
   *   (Optional)
   * @param string $sites_org_family
   *   (Optional)
   * @param string $sites_org_fax
   *   (Optional)
   * @param string $sites_org_name
   *   (Optional)
   * @param string $sites_org_name__auto
   *   (Optional)
   * @param string $sites_org_name__raw
   *   (Optional)
   * @param string $sites_org_phone
   *   (Optional)
   * @param string $sites_org_status
   *   (Optional)
   * @param string $sites_org_status_date
   *   (Optional)
   * @param string $sites_org_to_family_relationship
   *   (Optional)
   * @param string $sites_org_tty
   *   (Optional)
   * @param string $sites_recruitment_status
   *   (Optional)
   * @param string $sites_recruitment_status_date
   *   (Optional)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise resolving to a ClinicalTrialsCollection object.
   */
  public function searchTrialsByGetAsyncWithHttpInfo($size = NULL, $from = NULL, $include = NULL, $exclude = NULL, $_fulltext = NULL, $sites_org_name_fulltext = NULL, $_trialids = NULL, $nci_id = NULL, $nct_id = NULL, $protocol_id = NULL, $ccr_id = NULL, $ctep_id = NULL, $dcp_id = NULL, $current_trial_status = NULL, $phase_phase = NULL, $study_protocol_type = NULL, $brief_title = NULL, $brief_summary = NULL, $official_title = NULL, $primary_purpose_primary_purpose_code = NULL, $accepts_healthy_volunteers_indicator = NULL, $acronym = NULL, $amendment_date = NULL, $anatomic_sites = NULL, $arms_arm_description = NULL, $arms_arm_name = NULL, $arms_arm_type = NULL, $arms_interventions_intervention_code = NULL, $arms_interventions_intervention_description = NULL, $arms_interventions_intervention_name = NULL, $arms_interventions_intervention_type = NULL, $arms_interventions_synonyms = NULL, $associated_studies_study_id = NULL, $associated_studies_study_id_type = NULL, $eligibility_structured_gender = NULL, $eligibility_structured_max_age_in_years_lte = NULL, $eligibility_structured_max_age_in_years_gte = NULL, $eligibility_structured_min_age_in_years_lte = NULL, $eligibility_structured_min_age_in_years_gte = NULL, $eligibility_structured_min_age_unit = NULL, $eligibility_structured_max_age_unit = NULL, $eligibility_structured_max_age_number_lte = NULL, $eligibility_structured_max_age_number_gte = NULL, $eligibility_structured_min_age_number_lte = NULL, $eligibility_structured_min_age_number_gte = NULL, $current_trial_status_date_lte = NULL, $current_trial_status_date_gte = NULL, $record_verification_date_lte = NULL, $record_verification_date_gte = NULL, $sites_org_coordinates_lat = NULL, $sites_org_coordinates_lon = NULL, $sites_org_coordinates_dist = NULL, $sites_contact_email = NULL, $sites_contact_name = NULL, $sites_contact_name__auto = NULL, $sites_contact_name__raw = NULL, $sites_contact_phone = NULL, $sites_generic_contact = NULL, $sites_org_address_line_1 = NULL, $sites_org_address_line_2 = NULL, $sites_org_city = NULL, $sites_org_postal_code = NULL, $sites_org_state_or_province = NULL, $sites_org_country = NULL, $sites_org_country__raw = NULL, $sites_org_email = NULL, $sites_org_family = NULL, $sites_org_fax = NULL, $sites_org_name = NULL, $sites_org_name__auto = NULL, $sites_org_name__raw = NULL, $sites_org_phone = NULL, $sites_org_status = NULL, $sites_org_status_date = NULL, $sites_org_to_family_relationship = NULL, $sites_org_tty = NULL, $sites_recruitment_status = NULL, $sites_recruitment_status_date = NULL) {

    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\ClinicalTrialsCollection';
    $request = $this->searchTrialsByGetRequest($size, $from, $include, $exclude, $_fulltext, $sites_org_name_fulltext, $_trialids, $nci_id, $nct_id, $protocol_id, $ccr_id, $ctep_id, $dcp_id, $current_trial_status, $phase_phase, $study_protocol_type, $brief_title, $brief_summary, $official_title, $primary_purpose_primary_purpose_code, $accepts_healthy_volunteers_indicator, $acronym, $amendment_date, $anatomic_sites, $arms_arm_description, $arms_arm_name, $arms_arm_type, $arms_interventions_intervention_code, $arms_interventions_intervention_description, $arms_interventions_intervention_name, $arms_interventions_intervention_type, $arms_interventions_synonyms, $associated_studies_study_id, $associated_studies_study_id_type, $eligibility_structured_gender, $eligibility_structured_max_age_in_years_lte, $eligibility_structured_max_age_in_years_gte, $eligibility_structured_min_age_in_years_lte, $eligibility_structured_min_age_in_years_gte, $eligibility_structured_min_age_unit, $eligibility_structured_max_age_unit, $eligibility_structured_max_age_number_lte, $eligibility_structured_max_age_number_gte, $eligibility_structured_min_age_number_lte, $eligibility_structured_min_age_number_gte, $current_trial_status_date_lte, $current_trial_status_date_gte, $record_verification_date_lte, $record_verification_date_gte, $sites_org_coordinates_lat, $sites_org_coordinates_lon, $sites_org_coordinates_dist, $sites_contact_email, $sites_contact_name, $sites_contact_name__auto, $sites_contact_name__raw, $sites_contact_phone, $sites_generic_contact, $sites_org_address_line_1, $sites_org_address_line_2, $sites_org_city, $sites_org_postal_code, $sites_org_state_or_province, $sites_org_country, $sites_org_country__raw, $sites_org_email, $sites_org_family, $sites_org_fax, $sites_org_name, $sites_org_name__auto, $sites_org_name__raw, $sites_org_phone, $sites_org_status, $sites_org_status_date, $sites_org_to_family_relationship, $sites_org_tty, $sites_recruitment_status, $sites_recruitment_status_date);

    return $this->client
      ->sendAsync($request, $this->createHttpClientOption())
      ->then(
              function ($response) use ($returnType) {
                $responseBody = $response->getBody();
                if ($returnType === '\SplFileObject') {
                  // Stream goes to serializer.
                  $content = $responseBody;
                }
                else {
                  $content = $responseBody->getContents();
                  if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                  }
                }

                return [
                  ObjectSerializer::deserialize($content, $returnType, []),
                  $response->getStatusCode(),
                  $response->getHeaders(),
                ];
              },
              function ($exception) {
                  $response = $exception->getResponse();
                  $statusCode = $response->getStatusCode();
                  throw new ApiException(
                      sprintf(
                          '[%d] Error connecting to the API (%s)',
                          $statusCode,
                          $exception->getRequest()->getUri()
                      ),
                      $statusCode,
                      $response->getHeaders(),
                      $response->getBody()
                  );
              }
          );
  }

  /**
   * Create request for operation 'searchTrialsByGet'.
   *
   * @param string $size
   *   Size of results. (optional)
   * @param string $from
   *   Starting from nth position of results lineup. (optional)
   * @param string $include
   *   Include only this attribute in trials and exclude others. (optional)
   * @param string $exclude
   *   Exclude only this attribute in trials and include others. (optional)
   * @param string $_fulltext
   *   Filter results by examining a variety of text-based fields. (optional)
   * @param string $sites_org_name_fulltext
   *   Filter results by examining words that make up organization name
   *   e.g &#x27;Mayo&#x27;. (optional)
   * @param string $_trialids
   *   Filter results by examining trial identifiers. (optional)
   * @param string $nci_id
   *   Search by NCI ID. (optional)
   * @param string $nct_id
   *   Search by NCT ID. (optional)
   * @param string $protocol_id
   *   Search by Protocol ID. (optional)
   * @param string $ccr_id
   *   Search by CCR ID. (optional)
   * @param string $ctep_id
   *   Search by CTEP ID (optional)
   * @param string $dcp_id
   *   Search by DCP ID (optional)
   * @param string $current_trial_status
   *   (Optional)
   * @param string $phase_phase
   *   (Optional)
   * @param string $study_protocol_type
   *   (Optional)
   * @param string $brief_title
   *   (Optional)
   * @param string $brief_summary
   *   (Optional)
   * @param string $official_title
   *   (Optional)
   * @param string $primary_purpose_primary_purpose_code
   *   (Optional)
   * @param string $accepts_healthy_volunteers_indicator
   *   (Optional)
   * @param string $acronym
   *   (Optional)
   * @param string $amendment_date
   *   (Optional)
   * @param string $anatomic_sites
   *   (Optional)
   * @param string $arms_arm_description
   *   (Optional)
   * @param string $arms_arm_name
   *   (Optional)
   * @param string $arms_arm_type
   *   (Optional)
   * @param string $arms_interventions_intervention_code
   *   (Optional)
   * @param string $arms_interventions_intervention_description
   *   (Optional)
   * @param string $arms_interventions_intervention_name
   *   (Optional)
   * @param string $arms_interventions_intervention_type
   *   (Optional)
   * @param string $arms_interventions_synonyms
   *   (Optional)
   * @param string $associated_studies_study_id
   *   (Optional)
   * @param string $associated_studies_study_id_type
   *   (Optional)
   * @param string $eligibility_structured_gender
   *   (Optional)
   * @param string $eligibility_structured_max_age_in_years_lte
   *   (Optional)
   * @param string $eligibility_structured_max_age_in_years_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_in_years_lte
   *   (Optional)
   * @param string $eligibility_structured_min_age_in_years_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_unit
   *   (Optional)
   * @param string $eligibility_structured_max_age_unit
   *   (Optional)
   * @param string $eligibility_structured_max_age_number_lte
   *   (Optional)
   * @param string $eligibility_structured_max_age_number_gte
   *   (Optional)
   * @param string $eligibility_structured_min_age_number_lte
   *   (Optional)
   * @param string $eligibility_structured_min_age_number_gte
   *   (Optional)
   * @param string $current_trial_status_date_lte
   *   (Optional)
   * @param string $current_trial_status_date_gte
   *   (Optional)
   * @param string $record_verification_date_lte
   *   (Optional)
   * @param string $record_verification_date_gte
   *   (Optional)
   * @param string $sites_org_coordinates_lat
   *   (Optional)
   * @param string $sites_org_coordinates_lon
   *   (Optional)
   * @param string $sites_org_coordinates_dist
   *   (Optional)
   * @param string $sites_contact_email
   *   (Optional)
   * @param string $sites_contact_name
   *   (Optional)
   * @param string $sites_contact_name__auto
   *   (Optional)
   * @param string $sites_contact_name__raw
   *   (Optional)
   * @param string $sites_contact_phone
   *   (Optional)
   * @param string $sites_generic_contact
   *   (Optional)
   * @param string $sites_org_address_line_1
   *   (Optional)
   * @param string $sites_org_address_line_2
   *   (Optional)
   * @param string $sites_org_city
   *   (Optional)
   * @param string $sites_org_postal_code
   *   (Optional)
   * @param string $sites_org_state_or_province
   *   (Optional)
   * @param string $sites_org_country
   *   (Optional)
   * @param string $sites_org_country__raw
   *   (Optional)
   * @param string $sites_org_email
   *   (Optional)
   * @param string $sites_org_family
   *   (Optional)
   * @param string $sites_org_fax
   *   (Optional)
   * @param string $sites_org_name
   *   (Optional)
   * @param string $sites_org_name__auto
   *   (Optional)
   * @param string $sites_org_name__raw
   *   (Optional)
   * @param string $sites_org_phone
   *   (Optional)
   * @param string $sites_org_status
   *   (Optional)
   * @param string $sites_org_status_date
   *   (Optional)
   * @param string $sites_org_to_family_relationship
   *   (Optional)
   * @param string $sites_org_tty
   *   (Optional)
   * @param string $sites_recruitment_status
   *   (Optional)
   * @param string $sites_recruitment_status_date
   *   (Optional)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Psr7\Request
   *   The Request to submit.
   */
  protected function searchTrialsByGetRequest($size = NULL, $from = NULL, $include = NULL, $exclude = NULL, $_fulltext = NULL, $sites_org_name_fulltext = NULL, $_trialids = NULL, $nci_id = NULL, $nct_id = NULL, $protocol_id = NULL, $ccr_id = NULL, $ctep_id = NULL, $dcp_id = NULL, $current_trial_status = NULL, $phase_phase = NULL, $study_protocol_type = NULL, $brief_title = NULL, $brief_summary = NULL, $official_title = NULL, $primary_purpose_primary_purpose_code = NULL, $accepts_healthy_volunteers_indicator = NULL, $acronym = NULL, $amendment_date = NULL, $anatomic_sites = NULL, $arms_arm_description = NULL, $arms_arm_name = NULL, $arms_arm_type = NULL, $arms_interventions_intervention_code = NULL, $arms_interventions_intervention_description = NULL, $arms_interventions_intervention_name = NULL, $arms_interventions_intervention_type = NULL, $arms_interventions_synonyms = NULL, $associated_studies_study_id = NULL, $associated_studies_study_id_type = NULL, $eligibility_structured_gender = NULL, $eligibility_structured_max_age_in_years_lte = NULL, $eligibility_structured_max_age_in_years_gte = NULL, $eligibility_structured_min_age_in_years_lte = NULL, $eligibility_structured_min_age_in_years_gte = NULL, $eligibility_structured_min_age_unit = NULL, $eligibility_structured_max_age_unit = NULL, $eligibility_structured_max_age_number_lte = NULL, $eligibility_structured_max_age_number_gte = NULL, $eligibility_structured_min_age_number_lte = NULL, $eligibility_structured_min_age_number_gte = NULL, $current_trial_status_date_lte = NULL, $current_trial_status_date_gte = NULL, $record_verification_date_lte = NULL, $record_verification_date_gte = NULL, $sites_org_coordinates_lat = NULL, $sites_org_coordinates_lon = NULL, $sites_org_coordinates_dist = NULL, $sites_contact_email = NULL, $sites_contact_name = NULL, $sites_contact_name__auto = NULL, $sites_contact_name__raw = NULL, $sites_contact_phone = NULL, $sites_generic_contact = NULL, $sites_org_address_line_1 = NULL, $sites_org_address_line_2 = NULL, $sites_org_city = NULL, $sites_org_postal_code = NULL, $sites_org_state_or_province = NULL, $sites_org_country = NULL, $sites_org_country__raw = NULL, $sites_org_email = NULL, $sites_org_family = NULL, $sites_org_fax = NULL, $sites_org_name = NULL, $sites_org_name__auto = NULL, $sites_org_name__raw = NULL, $sites_org_phone = NULL, $sites_org_status = NULL, $sites_org_status_date = NULL, $sites_org_to_family_relationship = NULL, $sites_org_tty = NULL, $sites_recruitment_status = NULL, $sites_recruitment_status_date = NULL) {

    $resourcePath = '/v1/clinical-trials';
    $formParams = [];
    $queryParams = [];
    $headerParams = [];
    $httpBody = '';
    $multipart = FALSE;

    // Query params.
    if ($size !== NULL) {
      $queryParams['size'] = ObjectSerializer::toQueryValue($size);
    }
    // Query params.
    if ($from !== NULL) {
      $queryParams['from'] = ObjectSerializer::toQueryValue($from);
    }
    // Query params.
    if ($include !== NULL) {
      $queryParams['include'] = ObjectSerializer::toQueryValue($include);
    }
    // Query params.
    if ($exclude !== NULL) {
      $queryParams['exclude'] = ObjectSerializer::toQueryValue($exclude);
    }
    // Query params.
    if ($_fulltext !== NULL) {
      $queryParams['_fulltext'] = ObjectSerializer::toQueryValue($_fulltext);
    }
    // Query params.
    if ($sites_org_name_fulltext !== NULL) {
      $queryParams['sites.org_name_fulltext'] = ObjectSerializer::toQueryValue($sites_org_name_fulltext);
    }
    // Query params.
    if ($_trialids !== NULL) {
      $queryParams['_trialids'] = ObjectSerializer::toQueryValue($_trialids);
    }
    // Query params.
    if ($nci_id !== NULL) {
      $queryParams['nci_id'] = ObjectSerializer::toQueryValue($nci_id);
    }
    // Query params.
    if ($nct_id !== NULL) {
      $queryParams['nct_id'] = ObjectSerializer::toQueryValue($nct_id);
    }
    // Query params.
    if ($protocol_id !== NULL) {
      $queryParams['protocol_id'] = ObjectSerializer::toQueryValue($protocol_id);
    }
    // Query params.
    if ($ccr_id !== NULL) {
      $queryParams['ccr_id'] = ObjectSerializer::toQueryValue($ccr_id);
    }
    // Query params.
    if ($ctep_id !== NULL) {
      $queryParams['ctep_id'] = ObjectSerializer::toQueryValue($ctep_id);
    }
    // Query params.
    if ($dcp_id !== NULL) {
      $queryParams['dcp_id'] = ObjectSerializer::toQueryValue($dcp_id);
    }
    // Query params.
    if ($current_trial_status !== NULL) {
      $queryParams['current_trial_status'] = ObjectSerializer::toQueryValue($current_trial_status);
    }
    // Query params.
    if ($phase_phase !== NULL) {
      $queryParams['phase.phase'] = ObjectSerializer::toQueryValue($phase_phase);
    }
    // Query params.
    if ($study_protocol_type !== NULL) {
      $queryParams['study_protocol_type'] = ObjectSerializer::toQueryValue($study_protocol_type);
    }
    // Query params.
    if ($brief_title !== NULL) {
      $queryParams['brief_title'] = ObjectSerializer::toQueryValue($brief_title);
    }
    // Query params.
    if ($brief_summary !== NULL) {
      $queryParams['brief_summary'] = ObjectSerializer::toQueryValue($brief_summary);
    }
    // Query params.
    if ($official_title !== NULL) {
      $queryParams['official_title'] = ObjectSerializer::toQueryValue($official_title);
    }
    // Query params.
    if ($primary_purpose_primary_purpose_code !== NULL) {
      $queryParams['primary_purpose.primary_purpose_code'] = ObjectSerializer::toQueryValue($primary_purpose_primary_purpose_code);
    }
    // Query params.
    if ($accepts_healthy_volunteers_indicator !== NULL) {
      $queryParams['accepts_healthy_volunteers_indicator'] = ObjectSerializer::toQueryValue($accepts_healthy_volunteers_indicator);
    }
    // Query params.
    if ($acronym !== NULL) {
      $queryParams['acronym'] = ObjectSerializer::toQueryValue($acronym);
    }
    // Query params.
    if ($amendment_date !== NULL) {
      $queryParams['amendment_date'] = ObjectSerializer::toQueryValue($amendment_date);
    }
    // Query params.
    if ($anatomic_sites !== NULL) {
      $queryParams['anatomic_sites'] = ObjectSerializer::toQueryValue($anatomic_sites);
    }
    // Query params.
    if ($arms_arm_description !== NULL) {
      $queryParams['arms.arm_description'] = ObjectSerializer::toQueryValue($arms_arm_description);
    }
    // Query params.
    if ($arms_arm_name !== NULL) {
      $queryParams['arms.arm_name'] = ObjectSerializer::toQueryValue($arms_arm_name);
    }
    // Query params.
    if ($arms_arm_type !== NULL) {
      $queryParams['arms.arm_type'] = ObjectSerializer::toQueryValue($arms_arm_type);
    }
    // Query params.
    if ($arms_interventions_intervention_code !== NULL) {
      $queryParams['arms.interventions.intervention_code'] = ObjectSerializer::toQueryValue($arms_interventions_intervention_code);
    }
    // Query params.
    if ($arms_interventions_intervention_description !== NULL) {
      $queryParams['arms.interventions.intervention_description'] = ObjectSerializer::toQueryValue($arms_interventions_intervention_description);
    }
    // Query params.
    if ($arms_interventions_intervention_name !== NULL) {
      $queryParams['arms.interventions.intervention_name'] = ObjectSerializer::toQueryValue($arms_interventions_intervention_name);
    }
    // Query params.
    if ($arms_interventions_intervention_type !== NULL) {
      $queryParams['arms.interventions.intervention_type'] = ObjectSerializer::toQueryValue($arms_interventions_intervention_type);
    }
    // Query params.
    if ($arms_interventions_synonyms !== NULL) {
      $queryParams['arms.interventions.synonyms'] = ObjectSerializer::toQueryValue($arms_interventions_synonyms);
    }
    // Query params.
    if ($associated_studies_study_id !== NULL) {
      $queryParams['associated_studies.study_id'] = ObjectSerializer::toQueryValue($associated_studies_study_id);
    }
    // Query params.
    if ($associated_studies_study_id_type !== NULL) {
      $queryParams['associated_studies.study_id_type'] = ObjectSerializer::toQueryValue($associated_studies_study_id_type);
    }
    // Query params.
    if ($eligibility_structured_gender !== NULL) {
      $queryParams['eligibility.structured.gender'] = ObjectSerializer::toQueryValue($eligibility_structured_gender);
    }
    // Query params.
    if ($eligibility_structured_max_age_in_years_lte !== NULL) {
      $queryParams['eligibility.structured.max_age_in_years_lte'] = ObjectSerializer::toQueryValue($eligibility_structured_max_age_in_years_lte);
    }
    // Query params.
    if ($eligibility_structured_max_age_in_years_gte !== NULL) {
      $queryParams['eligibility.structured.max_age_in_years_gte'] = ObjectSerializer::toQueryValue($eligibility_structured_max_age_in_years_gte);
    }
    // Query params.
    if ($eligibility_structured_min_age_in_years_lte !== NULL) {
      $queryParams['eligibility.structured.min_age_in_years_lte'] = ObjectSerializer::toQueryValue($eligibility_structured_min_age_in_years_lte);
    }
    // Query params.
    if ($eligibility_structured_min_age_in_years_gte !== NULL) {
      $queryParams['eligibility.structured.min_age_in_years_gte'] = ObjectSerializer::toQueryValue($eligibility_structured_min_age_in_years_gte);
    }
    // Query params.
    if ($eligibility_structured_min_age_unit !== NULL) {
      $queryParams['eligibility.structured.min_age_unit'] = ObjectSerializer::toQueryValue($eligibility_structured_min_age_unit);
    }
    // Query params.
    if ($eligibility_structured_max_age_unit !== NULL) {
      $queryParams['eligibility.structured.max_age_unit'] = ObjectSerializer::toQueryValue($eligibility_structured_max_age_unit);
    }
    // Query params.
    if ($eligibility_structured_max_age_number_lte !== NULL) {
      $queryParams['eligibility.structured.max_age_number_lte'] = ObjectSerializer::toQueryValue($eligibility_structured_max_age_number_lte);
    }
    // Query params.
    if ($eligibility_structured_max_age_number_gte !== NULL) {
      $queryParams['eligibility.structured.max_age_number_gte'] = ObjectSerializer::toQueryValue($eligibility_structured_max_age_number_gte);
    }
    // Query params.
    if ($eligibility_structured_min_age_number_lte !== NULL) {
      $queryParams['eligibility.structured.min_age_number_lte'] = ObjectSerializer::toQueryValue($eligibility_structured_min_age_number_lte);
    }
    // Query params.
    if ($eligibility_structured_min_age_number_gte !== NULL) {
      $queryParams['eligibility.structured.min_age_number_gte'] = ObjectSerializer::toQueryValue($eligibility_structured_min_age_number_gte);
    }
    // Query params.
    if ($current_trial_status_date_lte !== NULL) {
      $queryParams['current_trial_status_date_lte'] = ObjectSerializer::toQueryValue($current_trial_status_date_lte);
    }
    // Query params.
    if ($current_trial_status_date_gte !== NULL) {
      $queryParams['current_trial_status_date_gte'] = ObjectSerializer::toQueryValue($current_trial_status_date_gte);
    }
    // Query params.
    if ($record_verification_date_lte !== NULL) {
      $queryParams['record_verification_date_lte'] = ObjectSerializer::toQueryValue($record_verification_date_lte);
    }
    // Query params.
    if ($record_verification_date_gte !== NULL) {
      $queryParams['record_verification_date_gte'] = ObjectSerializer::toQueryValue($record_verification_date_gte);
    }
    // Query params.
    if ($sites_org_coordinates_lat !== NULL) {
      $queryParams['sites.org_coordinates_lat'] = ObjectSerializer::toQueryValue($sites_org_coordinates_lat);
    }
    // Query params.
    if ($sites_org_coordinates_lon !== NULL) {
      $queryParams['sites.org_coordinates_lon'] = ObjectSerializer::toQueryValue($sites_org_coordinates_lon);
    }
    // Query params.
    if ($sites_org_coordinates_dist !== NULL) {
      $queryParams['sites.org_coordinates_dist'] = ObjectSerializer::toQueryValue($sites_org_coordinates_dist);
    }
    // Query params.
    if ($sites_contact_email !== NULL) {
      $queryParams['sites.contact_email'] = ObjectSerializer::toQueryValue($sites_contact_email);
    }
    // Query params.
    if ($sites_contact_name !== NULL) {
      $queryParams['sites.contact_name'] = ObjectSerializer::toQueryValue($sites_contact_name);
    }
    // Query params.
    if ($sites_contact_name__auto !== NULL) {
      $queryParams['sites.contact_name._auto'] = ObjectSerializer::toQueryValue($sites_contact_name__auto);
    }
    // Query params.
    if ($sites_contact_name__raw !== NULL) {
      $queryParams['sites.contact_name._raw'] = ObjectSerializer::toQueryValue($sites_contact_name__raw);
    }
    // Query params.
    if ($sites_contact_phone !== NULL) {
      $queryParams['sites.contact_phone'] = ObjectSerializer::toQueryValue($sites_contact_phone);
    }
    // Query params.
    if ($sites_generic_contact !== NULL) {
      $queryParams['sites.generic_contact'] = ObjectSerializer::toQueryValue($sites_generic_contact);
    }
    // Query params.
    if ($sites_org_address_line_1 !== NULL) {
      $queryParams['sites.org_address_line_1'] = ObjectSerializer::toQueryValue($sites_org_address_line_1);
    }
    // Query params.
    if ($sites_org_address_line_2 !== NULL) {
      $queryParams['sites.org_address_line_2'] = ObjectSerializer::toQueryValue($sites_org_address_line_2);
    }
    // Query params.
    if ($sites_org_city !== NULL) {
      $queryParams['sites.org_city'] = ObjectSerializer::toQueryValue($sites_org_city);
    }
    // Query params.
    if ($sites_org_postal_code !== NULL) {
      $queryParams['sites.org_postal_code'] = ObjectSerializer::toQueryValue($sites_org_postal_code);
    }
    // Query params.
    if ($sites_org_state_or_province !== NULL) {
      $queryParams['sites.org_state_or_province'] = ObjectSerializer::toQueryValue($sites_org_state_or_province);
    }
    // Query params.
    if ($sites_org_country !== NULL) {
      $queryParams['sites.org_country'] = ObjectSerializer::toQueryValue($sites_org_country);
    }
    // Query params.
    if ($sites_org_country__raw !== NULL) {
      $queryParams['sites.org_country._raw'] = ObjectSerializer::toQueryValue($sites_org_country__raw);
    }
    // Query params.
    if ($sites_org_email !== NULL) {
      $queryParams['sites.org_email'] = ObjectSerializer::toQueryValue($sites_org_email);
    }
    // Query params.
    if ($sites_org_family !== NULL) {
      $queryParams['sites.org_family'] = ObjectSerializer::toQueryValue($sites_org_family);
    }
    // Query params.
    if ($sites_org_fax !== NULL) {
      $queryParams['sites.org_fax'] = ObjectSerializer::toQueryValue($sites_org_fax);
    }
    // Query params.
    if ($sites_org_name !== NULL) {
      $queryParams['sites.org_name'] = ObjectSerializer::toQueryValue($sites_org_name);
    }
    // Query params.
    if ($sites_org_name__auto !== NULL) {
      $queryParams['sites.org_name._auto'] = ObjectSerializer::toQueryValue($sites_org_name__auto);
    }
    // Query params.
    if ($sites_org_name__raw !== NULL) {
      $queryParams['sites.org_name._raw'] = ObjectSerializer::toQueryValue($sites_org_name__raw);
    }
    // Query params.
    if ($sites_org_phone !== NULL) {
      $queryParams['sites.org_phone'] = ObjectSerializer::toQueryValue($sites_org_phone);
    }
    // Query params.
    if ($sites_org_status !== NULL) {
      $queryParams['sites.org_status'] = ObjectSerializer::toQueryValue($sites_org_status);
    }
    // Query params.
    if ($sites_org_status_date !== NULL) {
      $queryParams['sites.org_status_date'] = ObjectSerializer::toQueryValue($sites_org_status_date);
    }
    // Query params.
    if ($sites_org_to_family_relationship !== NULL) {
      $queryParams['sites.org_to_family_relationship'] = ObjectSerializer::toQueryValue($sites_org_to_family_relationship);
    }
    // Query params.
    if ($sites_org_tty !== NULL) {
      $queryParams['sites.org_tty'] = ObjectSerializer::toQueryValue($sites_org_tty);
    }
    // Query params.
    if ($sites_recruitment_status !== NULL) {
      $queryParams['sites.recruitment_status'] = ObjectSerializer::toQueryValue($sites_recruitment_status);
    }
    // Query params.
    if ($sites_recruitment_status_date !== NULL) {
      $queryParams['sites.recruitment_status_date'] = ObjectSerializer::toQueryValue($sites_recruitment_status_date);
    }

    // Body params.
    $_tempBody = NULL;

    if ($multipart) {
      $headers = $this->headerSelector->selectHeadersForMultipart(
            []
        );
    }
    else {
      $headers = $this->headerSelector->selectHeaders(
            [],
            []
            );
    }

    // For model (json/xml)
    if (isset($_tempBody)) {
      // $_tempBody is the method argument, if present
      $httpBody = $_tempBody;
      // \stdClass has no __toString(), so we should encode it manually
      if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
      }
    }
    elseif (count($formParams) > 0) {
      if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
          $multipartContents[] = [
            'name' => $formParamName,
            'contents' => $formParamValue,
          ];
        }
        // For HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

      }
      elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

      }
      else {
        // For HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
      }
    }

    $defaultHeaders = [];
    if ($this->config->getUserAgent()) {
      $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
    }

    $headers = array_merge(
          $defaultHeaders,
          $headerParams,
          $headers
      );

    $query = \GuzzleHttp\Psr7\build_query($queryParams);
    return new Request(
          'GET',
          $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
          $headers,
          $httpBody
      );
  }

  /**
   * Operation searchTrialsByPost.
   *
   * Search Trials by POST.
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return mixed
   *   A ClinicalTrialsCollection object.
   */
  public function searchTrialsByPost() {
    list($response) = $this->searchTrialsByPostWithHttpInfo();
    return $response;
  }

  /**
   * Operation searchTrialsByPostWithHttpInfo.
   *
   * Search Trials by POST.
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return array
   *   Deserialized data, HTTP status code, HTTP response headers
   *   (array of strings).
   */
  public function searchTrialsByPostWithHttpInfo() {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\ClinicalTrialsCollection';
    $request = $this->searchTrialsByPostRequest();

    try {
      $options = $this->createHttpClientOption();
      try {
        $response = $this->client->send($request, $options);
      }
      catch (RequestException $e) {
        throw new ApiException(
              "[{$e->getCode()}] {$e->getMessage()}",
              $e->getCode(),
              $e->getResponse() ? $e->getResponse()->getHeaders() : NULL,
              $e->getResponse() ? $e->getResponse()->getBody()->getContents() : NULL
                );
      }

      $statusCode = $response->getStatusCode();

      if ($statusCode < 200 || $statusCode > 299) {
        throw new ApiException(
              sprintf(
                  '[%d] Error connecting to the API (%s)',
                  $statusCode,
                  $request->getUri()
              ),
              $statusCode,
              $response->getHeaders(),
              $response->getBody()
          );
      }

      $responseBody = $response->getBody();
      if ($returnType === '\SplFileObject') {
        // Stream goes to serializer.
        $content = $responseBody;
      }
      else {
        $content = $responseBody->getContents();
        if (!in_array($returnType, ['string', 'integer', 'bool'])) {
          $content = json_decode($content);
        }
      }

      return [
        ObjectSerializer::deserialize($content, $returnType, []),
        $response->getStatusCode(),
        $response->getHeaders(),
      ];

    }
    catch (ApiException $e) {
      switch ($e->getCode()) {
        case 200:
          $data = ObjectSerializer::deserialize(
            $e->getResponseBody(),
            '\Swagger\Client\Model\Resource',
            $e->getResponseHeaders()
          );
          $e->setResponseObject($data);
          break;
      }
      throw $e;
    }
  }

  /**
   * Operation searchTrialsByPostAsync.
   *
   * Search Trials by POST.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise resolving to a ClinicalTrialsCollection object.
   */
  public function searchTrialsByPostAsync() {
    return $this->searchTrialsByPostAsyncWithHttpInfo()
      ->then(
              function ($response) {
                  return $response[0];
              }
          );
  }

  /**
   * Operation searchTrialsByPostAsyncWithHttpInfo.
   *
   * Search Trials by POST.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise resolving to a ClinicalTrialsCollection.
   */
  public function searchTrialsByPostAsyncWithHttpInfo() {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\ClinicalTrialsCollection';
    $request = $this->searchTrialsByPostRequest();

    return $this->client
      ->sendAsync($request, $this->createHttpClientOption())
      ->then(
              function ($response) use ($returnType) {
                $responseBody = $response->getBody();
                if ($returnType === '\SplFileObject') {
                  // Stream goes to serializer.
                  $content = $responseBody;
                }
                else {
                  $content = $responseBody->getContents();
                  if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                  }
                }

                return [
                  ObjectSerializer::deserialize($content, $returnType, []),
                  $response->getStatusCode(),
                  $response->getHeaders(),
                ];
              },
              function ($exception) {
                  $response = $exception->getResponse();
                  $statusCode = $response->getStatusCode();
                  throw new ApiException(
                      sprintf(
                          '[%d] Error connecting to the API (%s)',
                          $statusCode,
                          $exception->getRequest()->getUri()
                      ),
                      $statusCode,
                      $response->getHeaders(),
                      $response->getBody()
                  );
              }
          );
  }

  /**
   * Create request for operation 'searchTrialsByPost'.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Psr7\Request
   *   The Request to submit.
   */
  protected function searchTrialsByPostRequest() {

    $resourcePath = '/v1/clinical-trials';
    $formParams = [];
    $queryParams = [];
    $headerParams = [];
    $httpBody = '';
    $multipart = FALSE;

    // Body params.
    $_tempBody = NULL;

    if ($multipart) {
      $headers = $this->headerSelector->selectHeadersForMultipart(
            []
        );
    }
    else {
      $headers = $this->headerSelector->selectHeaders(
            [],
            ['application/json']
            );
    }

    // For model (json/xml)
    if (isset($_tempBody)) {
      // $_tempBody is the method argument, if present
      $httpBody = $_tempBody;
      // \stdClass has no __toString(), so we should encode it manually
      if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
      }
    }
    elseif (count($formParams) > 0) {
      if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
          $multipartContents[] = [
            'name' => $formParamName,
            'contents' => $formParamValue,
          ];
        }
        // For HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

      }
      elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

      }
      else {
        // For HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
      }
    }

    $defaultHeaders = [];
    if ($this->config->getUserAgent()) {
      $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
    }

    $headers = array_merge(
          $defaultHeaders,
          $headerParams,
          $headers
      );

    $query = \GuzzleHttp\Psr7\build_query($queryParams);
    return new Request(
          'POST',
          $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
          $headers,
          $httpBody
      );
  }

  /**
   * Create http client option.
   *
   * @throws \RuntimeException
   *   On file opening failure.
   *
   * @return array
   *   HTTP client options.
   */
  protected function createHttpClientOption() {
    $options = [];
    if ($this->config->getDebug()) {
      $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
      if (!$options[RequestOptions::DEBUG]) {
        throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
      }
    }

    return $options;
  }

}
