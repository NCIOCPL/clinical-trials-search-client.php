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
 * Terms Api wrapper.
 */
class TermsApi implements TermsApiInterface {
  /**
   * The Guzzle client.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $client;

  /**
   * Configuration object.
   *
   * @var \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration
   */
  protected $config;

  /**
   * The header selctor.
   *
   * @var \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\HeaderSelector
   */
  protected $headerSelector;

  /**
   * The constructor.
   *
   * @param \GuzzleHttp\ClientInterface $client
   *   GuzzleHttp client.
   * @param \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration $config
   *   Optional configuration object.
   * @param \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\HeaderSelector $selector
   *   Optional header selector.
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
   * Getter for the instances configuration object.
   *
   * @return \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration
   *   The configuration.
   */
  public function getConfig() {
    return $this->config;
  }

  /**
   * Operation getTermByTermKey.
   *
   * Get Term by 'term_key' value.
   *
   * @param string $term_key
   *   The key uniquely identifying the term. (required)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   *
   * @throws \InvalidArgumentException
   *
   * @return \NCIOCPL\ClinicalTrialSearch\Model\Term
   *   The Term that's been retrieved.
   */
  public function getTermByTermKey($term_key) {
    list($response) = $this->getTermByTermKeyWithHttpInfo($term_key);
    return $response;
  }

  /**
   * Operation getTermByTermKeyWithHttpInfo.
   *
   * Get Term by 'term_key' value.
   *
   * @param string $term_key
   *   Unique identifier of the term. (required)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   *
   * @throws \InvalidArgumentException
   *
   * @return array
   *   Of null, HTTP status code, HTTP response headers (array of strings).
   */
  public function getTermByTermKeyWithHttpInfo($term_key) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\Term';
    $request = $this->getTermByTermKeyRequest($term_key);

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
          '\NCIOCPL\ClinicalTrialSearch\Model\Term',
            $e->getResponseHeaders()
          );
          $e->setResponseObject($data);
          break;
      }
      throw $e;
    }
  }

  /**
   * Operation getTermByTermKeyAsync.
   *
   * Get Term by 'term_key' value.
   *
   * @param string $term_key
   *   The key uniqeuly identifying the term. (required)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   Yields a Term object.
   */
  public function getTermByTermKeyAsync($term_key) {
    return $this->getTermByTermKeyAsyncWithHttpInfo($term_key)
      ->then(
              function ($response) {
                  return $response[0];
              }
          );
  }

  /**
   * Operation getTermByTermKeyAsyncWithHttpInfo.
   *
   * Get Term by 'term_key' value.
   *
   * @param string $term_key
   *   The key uniqeuly identifying the term. (required)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise yielding a Term object.
   */
  public function getTermByTermKeyAsyncWithHttpInfo($term_key) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\Term';
    $request = $this->getTermByTermKeyRequest($term_key);

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
                  if ($returnType !== 'string') {
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
   * Create request for operation 'getTermByTermKey'.
   *
   * @param string $term_key
   *   The key value identifying the term. (required).
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Psr7\Request
   *   The request to submit.
   */
  protected function getTermByTermKeyRequest($term_key) {
    // Verify the required parameter 'term_key' is set.
    if ($term_key === NULL || (is_array($term_key) && count($term_key) === 0)) {
      throw new \InvalidArgumentException(
            'Missing the required parameter $term_key when calling getTermByTermKey'
        );
    }

    $resourcePath = '/v1/term/{term_key}';
    $formParams = [];
    $queryParams = [];
    $headerParams = [];
    $httpBody = '';
    $multipart = FALSE;

    // Path params.
    if ($term_key !== NULL) {
      $resourcePath = str_replace(
            '{term_key}',
            ObjectSerializer::toPathValue($term_key),
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
   * Operation searchTermsByGet.
   *
   * Search Terms by GET.
   *
   * @param string $term
   *   Term (optional)
   * @param string $term_type
   *   Term_type (optional)
   * @param string $sort
   *   Sort by &#x27;term&#x27; if sort is default alphabetically asc or
   *   &#x27;count&#x27; by occurance default desc otherwise use order.
   *   (optional)
   * @param string $order
   *   Asc or Desc. (optional)
   * @param string $size
   *   Size (optional)
   * @param string $from
   *   From (optional).
   * @param string $codes
   *   Used with _diseases (optional).
   * @param string $current_trial_statuses
   *   Current_trial_statuses (optional).
   * @param string $org_country
   *   Org_country (optional).
   * @param string $org_state_or_province
   *   Org_state_or_province (optional).
   * @param string $org_city
   *   Org city (optional).
   * @param string $org_postal_code
   *   Org postal_code (optional).
   * @param string $org_to_family_relationship
   *   Org Family Relationship: To be used with _orgs_by_location to set family
   *   relationship (optional).
   * @param string $org_coordinates_lon
   *   Longitude: To be used with _orgs_by_location to set longitude
   *   (optional).
   * @param string $org_coordinates_lat
   *   Latitude: To be used with _orgs_by_location to set latitude (optional).
   * @param string $org_coordinates_dist
   *   Distance (in miles): To be used with _orgs_by_location to find distance
   *   from coordinates OR postal code (optional).
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return \NCIOCPL\ClinicalTrialSearch\Model\TermsCollection
   *   Terms matching the search criteria.
   */
  public function searchTermsByGet($term = NULL, $term_type = NULL, $sort = NULL, $order = NULL, $size = NULL, $from = NULL, $codes = NULL, $current_trial_statuses = NULL, $org_country = NULL, $org_state_or_province = NULL, $org_city = NULL, $org_postal_code = NULL, $org_to_family_relationship = NULL, $org_coordinates_lon = NULL, $org_coordinates_lat = NULL, $org_coordinates_dist = NULL) {
    list($response) = $this->searchTermsByGetWithHttpInfo($term, $term_type, $sort, $order, $size, $from, $codes, $current_trial_statuses, $org_country, $org_state_or_province, $org_city, $org_postal_code, $org_to_family_relationship, $org_coordinates_lon, $org_coordinates_lat, $org_coordinates_dist);
    return $response;
  }

  /**
   * Operation searchTermsByGetWithHttpInfo.
   *
   * Search Terms by GET.
   *
   * @param string $term
   *   (Optional)
   * @param string $term_type
   *   (Optional)
   * @param string $sort
   *   Sort by &#x27;term&#x27; if sort is default alphabetically asc or
   *   &#x27;count&#x27; by occurance default desc otherwise use order.
   *   (optional)
   * @param string $order
   *   Asc or Desc. (optional)
   * @param string $size
   *   (Optional)
   * @param string $from
   *   (Optional)
   * @param string $codes
   *   Used with _diseases (optional)
   * @param string $current_trial_statuses
   *   (Optional)
   * @param string $org_country
   *   (Optional)
   * @param string $org_state_or_province
   *   (Optional)
   * @param string $org_city
   *   (Optional)
   * @param string $org_postal_code
   *   (Optional)
   * @param string $org_to_family_relationship
   *   Org Family Relationship: To be used with _orgs_by_location to set family
   *   relationship (optional).
   * @param string $org_coordinates_lon
   *   Longitude: To be used with _orgs_by_location to set longitude
   *   (optional).
   * @param string $org_coordinates_lat
   *   Latitude: To be used with _orgs_by_location to set latitude (optional).
   * @param string $org_coordinates_dist
   *   Distance (in miles): To be used with _orgs_by_location to find distance
   *   from coordinates OR postal code (optional).
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return array
   *   Of deserialized data, HTTP status code, HTTP response headers.
   */
  public function searchTermsByGetWithHttpInfo($term = NULL, $term_type = NULL, $sort = NULL, $order = NULL, $size = NULL, $from = NULL, $codes = NULL, $current_trial_statuses = NULL, $org_country = NULL, $org_state_or_province = NULL, $org_city = NULL, $org_postal_code = NULL, $org_to_family_relationship = NULL, $org_coordinates_lon = NULL, $org_coordinates_lat = NULL, $org_coordinates_dist = NULL) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\TermsCollection';
    $request = $this->searchTermsByGetRequest($term, $term_type, $sort, $order, $size, $from, $codes, $current_trial_statuses, $org_country, $org_state_or_province, $org_city, $org_postal_code, $org_to_family_relationship, $org_coordinates_lon, $org_coordinates_lat, $org_coordinates_dist);

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
   * Operation searchTermsByGetAsync.
   *
   * Search Terms by GET.
   *
   * @param string $term
   *   (Optional)
   * @param string $term_type
   *   (Optional)
   * @param string $sort
   *   Sort by &#x27;term&#x27; if sort is default alphabetically asc or
   *   &#x27;count&#x27; by occurance default desc otherwise use order.
   *   (optional)
   * @param string $order
   *   Asc or Desc. (optional)
   * @param string $size
   *   (Optional)
   * @param string $from
   *   (Optional)
   * @param string $codes
   *   Used with _diseases (optional)
   * @param string $current_trial_statuses
   *   (Optional)
   * @param string $org_country
   *   (Optional)
   * @param string $org_state_or_province
   *   (Optional)
   * @param string $org_city
   *   (Optional)
   * @param string $org_postal_code
   *   (Optional)
   * @param string $org_to_family_relationship
   *   Org Family Relationship: To be used with _orgs_by_location to set family
   *   relationship (optional).
   * @param string $org_coordinates_lon
   *   Longitude: To be used with _orgs_by_location to set longitude
   *   (optional).
   * @param string $org_coordinates_lat
   *   Latitude: To be used with _orgs_by_location to set latitude (optional).
   * @param string $org_coordinates_dist
   *   Distance (in miles): To be used with _orgs_by_location to find distance
   *   from coordinates OR postal code (optional).
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   Promise yielding a TermsCollection object.
   */
  public function searchTermsByGetAsync($term = NULL, $term_type = NULL, $sort = NULL, $order = NULL, $size = NULL, $from = NULL, $codes = NULL, $current_trial_statuses = NULL, $org_country = NULL, $org_state_or_province = NULL, $org_city = NULL, $org_postal_code = NULL, $org_to_family_relationship = NULL, $org_coordinates_lon = NULL, $org_coordinates_lat = NULL, $org_coordinates_dist = NULL) {
    return $this->searchTermsByGetAsyncWithHttpInfo($term, $term_type, $sort, $order, $size, $from, $codes, $current_trial_statuses, $org_country, $org_state_or_province, $org_city, $org_postal_code, $org_to_family_relationship, $org_coordinates_lon, $org_coordinates_lat, $org_coordinates_dist)
      ->then(
              function ($response) {
                  return $response[0];
              }
          );
  }

  /**
   * Operation searchTermsByGetAsyncWithHttpInfo.
   *
   * Search Terms by GET.
   *
   * @param string $term
   *   (Optional)
   * @param string $term_type
   *   (Optional)
   * @param string $sort
   *   Sort by &#x27;term&#x27; if sort is default alphabetically asc or
   *   &#x27;count&#x27; by occurance default desc otherwise use order.
   *   (Optional)
   * @param string $order
   *   Asc or Desc. (optional)
   * @param string $size
   *   (Optional)
   * @param string $from
   *   (Optional)
   * @param string $codes
   *   Used with _diseases (optional).
   * @param string $current_trial_statuses
   *   (Optional)
   * @param string $org_country
   *   (Optional)
   * @param string $org_state_or_province
   *   (Optional)
   * @param string $org_city
   *   (Optional)
   * @param string $org_postal_code
   *   (Optional)
   * @param string $org_to_family_relationship
   *   Org Family Relationship: To be used with _orgs_by_location to set family
   *   relationship (optional).
   * @param string $org_coordinates_lon
   *   Longitude: To be used with _orgs_by_location to set longitude
   *   (optional).
   * @param string $org_coordinates_lat
   *   Latitude: To be used with _orgs_by_location to set latitude (optional).
   * @param string $org_coordinates_dist
   *   Distance (in miles): To be used with _orgs_by_location to find distance
   *   from coordinates OR postal code (optional).
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   Promise yielding a TermsCollection object.
   */
  public function searchTermsByGetAsyncWithHttpInfo($term = NULL, $term_type = NULL, $sort = NULL, $order = NULL, $size = NULL, $from = NULL, $codes = NULL, $current_trial_statuses = NULL, $org_country = NULL, $org_state_or_province = NULL, $org_city = NULL, $org_postal_code = NULL, $org_to_family_relationship = NULL, $org_coordinates_lon = NULL, $org_coordinates_lat = NULL, $org_coordinates_dist = NULL) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\TermsCollection';
    $request = $this->searchTermsByGetRequest($term, $term_type, $sort, $order, $size, $from, $codes, $current_trial_statuses, $org_country, $org_state_or_province, $org_city, $org_postal_code, $org_to_family_relationship, $org_coordinates_lon, $org_coordinates_lat, $org_coordinates_dist);

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
   * Create request for operation 'searchTermsByGet'.
   *
   * @param string $term
   *   (Optional)
   * @param string $term_type
   *   (Optional)
   * @param string $sort
   *   Sort by &#x27;term&#x27; if sort is default alphabetically asc or
   *   &#x27;count&#x27; by occurance default desc otherwise use order.
   *   (optional)
   * @param string $order
   *   Asc or Desc. (optional)
   * @param string $size
   *   (Optional)
   * @param string $from
   *   (Optional)
   * @param string $codes
   *   Used with _diseases (optional).
   * @param string $current_trial_statuses
   *   (Optional)
   * @param string $org_country
   *   (Optional)
   * @param string $org_state_or_province
   *   (Optional)
   * @param string $org_city
   *   (Optional)
   * @param string $org_postal_code
   *   (Optional)
   * @param string $org_to_family_relationship
   *   Org Family Relationship: To be used with _orgs_by_location to set family
   *   relationship (optional)
   * @param string $org_coordinates_lon
   *   Longitude: To be used with _orgs_by_location to set longitude
   *   (optional).
   * @param string $org_coordinates_lat
   *   Latitude: To be used with _orgs_by_location to set latitude (optional).
   * @param string $org_coordinates_dist
   *   Distance (in miles): To be used with _orgs_by_location to find distance
   *   from coordinates OR postal code (optional).
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Psr7\Request
   *   The search request to submit.
   */
  protected function searchTermsByGetRequest($term = NULL, $term_type = NULL, $sort = NULL, $order = NULL, $size = NULL, $from = NULL, $codes = NULL, $current_trial_statuses = NULL, $org_country = NULL, $org_state_or_province = NULL, $org_city = NULL, $org_postal_code = NULL, $org_to_family_relationship = NULL, $org_coordinates_lon = NULL, $org_coordinates_lat = NULL, $org_coordinates_dist = NULL) {

    $resourcePath = '/v1/terms';
    $formParams = [];
    $queryParams = [];
    $headerParams = [];
    $httpBody = '';
    $multipart = FALSE;

    // Query params.
    if ($term !== NULL) {
      $queryParams['term'] = ObjectSerializer::toQueryValue($term);
    }
    // Query params.
    if ($term_type !== NULL) {
      $queryParams['term_type'] = ObjectSerializer::toQueryValue($term_type);
    }
    // Query params.
    if ($sort !== NULL) {
      $queryParams['sort'] = ObjectSerializer::toQueryValue($sort);
    }
    // Query params.
    if ($order !== NULL) {
      $queryParams['order'] = ObjectSerializer::toQueryValue($order);
    }
    // Query params.
    if ($size !== NULL) {
      $queryParams['size'] = ObjectSerializer::toQueryValue($size);
    }
    // Query params.
    if ($from !== NULL) {
      $queryParams['from'] = ObjectSerializer::toQueryValue($from);
    }
    // Query params.
    if ($codes !== NULL) {
      $queryParams['codes'] = ObjectSerializer::toQueryValue($codes);
    }
    // Query params.
    if ($current_trial_statuses !== NULL) {
      $queryParams['current_trial_statuses'] = ObjectSerializer::toQueryValue($current_trial_statuses);
    }
    // Query params.
    if ($org_country !== NULL) {
      $queryParams['org_country'] = ObjectSerializer::toQueryValue($org_country);
    }
    // Query params.
    if ($org_state_or_province !== NULL) {
      $queryParams['org_state_or_province'] = ObjectSerializer::toQueryValue($org_state_or_province);
    }
    // Query params.
    if ($org_city !== NULL) {
      $queryParams['org_city'] = ObjectSerializer::toQueryValue($org_city);
    }
    // Query params.
    if ($org_postal_code !== NULL) {
      $queryParams['org_postal_code'] = ObjectSerializer::toQueryValue($org_postal_code);
    }
    // Query params.
    if ($org_to_family_relationship !== NULL) {
      $queryParams['org_to_family_relationship'] = ObjectSerializer::toQueryValue($org_to_family_relationship);
    }
    // Query params.
    if ($org_coordinates_lon !== NULL) {
      $queryParams['org_coordinates_lon'] = ObjectSerializer::toQueryValue($org_coordinates_lon);
    }
    // Query params.
    if ($org_coordinates_lat !== NULL) {
      $queryParams['org_coordinates_lat'] = ObjectSerializer::toQueryValue($org_coordinates_lat);
    }
    // Query params.
    if ($org_coordinates_dist !== NULL) {
      $queryParams['org_coordinates_dist'] = ObjectSerializer::toQueryValue($org_coordinates_dist);
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
   * Search for Terms specified in a JSON document.
   *
   * @param string $searchDocument
   *   A JSON document containing search criteria. Property names may match
   *    any of the parameters specified for searchTermsByGet().
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return TermsCollection
   *   A single TermsCollection object containing zero or more terms matching
   *   the criteria in $searchDocument.
   */
  public function searchTermsByPost($searchDocument) {
    list($response) = $this->searchTermsByPostWithHttpInfo($searchDocument);
    return $response;
  }

  /**
   * Operation searchTermsByPostWithHttpInfo.
   *
   * Internals of searchTermsByPost().
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   *
   * @throws \InvalidArgumentException
   *
   * @return array
   *   Deserialized TermsCollection, HTTP status code, HTTP response headers
   *   (array of strings)
   */
  public function searchTermsByPostWithHttpInfo($searchDocument) {

    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\TermsCollection';
    $request = $this->searchTermsByPostRequest($searchDocument);

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
   * Operation searchTermsByPostAsync.
   *
   * Search Terms by POST.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise, yielding a TermsCollection object.
   */
  public function searchTermsByPostAsync($searchDocument) {
    return $this->searchTermsByPostAsyncWithHttpInfo($searchDocument)
      ->then(
              function ($response) {
                  return $response[0];
              }
          );
  }

  /**
   * Operation searchTermsByPostAsyncWithHttpInfo.
   *
   * Search Terms by POST.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise, yielding a TermsCollection object.
   */
  public function searchTermsByPostAsyncWithHttpInfo($searchDocument) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\TermsCollection';
    $request = $this->searchTermsByPostRequest($searchDocument);

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
   * Create request for operation 'searchTermsByPost'.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Psr7\Request
   *   The request to send.
   */
  protected function searchTermsByPostRequest($searchDocument) {

    $resourcePath = '/v1/terms';
    $formParams = [];
    $queryParams = [];
    $headerParams = [];
    $httpBody = $searchDocument;
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
   *   HTTP client options
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
