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
 * DiseasesApi Class Doc Comment.
 */
class DiseasesApi implements DiseasesApiInterface {
  /**
   * Guzzle connection.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $client;

  /**
   * The configuration object.
   *
   * @var \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration
   */
  protected $config;

  /**
   * The header selector.
   *
   * @var \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\HeaderSelector
   */
  protected $headerSelector;

  /**
   * Constructor.
   *
   * @param \GuzzleHttp\ClientInterface $client
   *   Optional Guzzle client.
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
   * Get the active configuration.
   *
   * @return \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration
   *   The configuration object.
   */
  public function getConfig() {
    return $this->config;
  }

  /**
   * Operation searchDiseasesByGet.
   *
   * Search Diseases by GET.
   *
   * @param string $name
   *   Name (optional)
   * @param string $type
   *   Type of Disease - Note that multiple values for type creates an
   *   &#x27;OR&#x27; condition for the result set. Results will meet one of
   *   the type values requested. Use &#x27;type&#x27; and
   *   &#x27;type_not&#x27; together to further filter results. (optional)
   * @param string $type_not
   *   This will do the opposite of &#x27;type&#x27; above and exclude rather
   *   than include. Note that multiple values for type creates an
   *   &#x27;AND&#x27; condition for the result set. Results will meet all
   *   menu_not values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27;
   *   together to further filter results. (optional)
   * @param string $parent_ids
   *   Setting the parent_id value will get you a direct child along a disease
   *   path. (optional)
   * @param string $ancestor_ids
   *   Setting an ancestor_ids value will get you any of the children along a
   *   disease path. (optional)
   * @param string $code
   *   Code (optional)
   * @param string $current_trial_status
   *   Current_trial_status (optional)
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   *
   * @throws \InvalidArgumentException
   */
  public function searchDiseasesByGet($name = NULL, $type = NULL, $type_not = NULL, $parent_ids = NULL, $ancestor_ids = NULL, $code = NULL, $current_trial_status = NULL, $sort = NULL, $order = NULL, $size = NULL) {
    $this->searchDiseasesByGetWithHttpInfo($name, $type, $type_not, $parent_ids, $ancestor_ids, $code, $current_trial_status, $sort, $order, $size);
  }

  /**
   * Operation searchDiseasesByGetWithHttpInfo.
   *
   * Search Diseases by GET.
   *
   * @param string $name
   *   (Optional)
   * @param string $type
   *   Type of Disease - Note that multiple values for type creates an
   *   &#x27;OR&#x27; condition for the result set. Results will meet one of
   *   the type values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27;
   *   together to further filter results. (optional)
   * @param string $type_not
   *   This will do the opposite of &#x27;type&#x27; above and exclude rather
   *   than include. Note that multiple values for type creates an
   *   &#x27;AND&#x27; condition for the result set. Results will meet all
   *   menu_not values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27;
   *   together to further filter results. (optional)
   * @param string $parent_ids
   *   Setting the parent_id value will get you a direct child along a disease
   *   path. (optional)
   * @param string $ancestor_ids
   *   Setting an ancestor_ids value will get you any of the children along a
   *   disease path. (optional)
   * @param string $code
   *   (Optional)
   * @param string $current_trial_status
   *   (Optional)
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   *
   * @throws \InvalidArgumentException
   *
   * @return array
   *   Disease, HTTP status code, HTTP response headers (array of strings)
   */
  public function searchDiseasesByGetWithHttpInfo($name = NULL, $type = NULL, $type_not = NULL, $parent_ids = NULL, $ancestor_ids = NULL, $code = NULL, $current_trial_status = NULL, $sort = NULL, $order = NULL, $size = NULL) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\DiseaseCollection';
    $request = $this->searchDiseasesByGetRequest($name, $type, $type_not, $parent_ids, $ancestor_ids, $code, $current_trial_status, $sort, $order, $size);

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
   * Operation searchDiseasesByGetAsync.
   *
   * Search Diseases by GET.
   *
   * @param string $name
   *   (Optional)
   * @param string $type
   *   Type of Disease - Note that multiple values for type creates an
   *   &#x27;OR&#x27; condition for the result set. Results will meet one of
   *   the type values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27;
   *   together to further filter results. (optional)
   * @param string $type_not
   *   This will do the opposite of &#x27;type&#x27; above and exclude rather
   *   than include. Note that multiple values for type creates an
   *   &#x27;AND&#x27; condition for the result set. Results will meet all
   *   menu_not values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27;
   *   together to further filter results. (optional)
   * @param string $parent_ids
   *   Setting the parent_id value will get you a direct child along a disease
   *   path. (optional)
   * @param string $ancestor_ids
   *   Setting an ancestor_ids value will get you any of the children along a
   *   disease path. (optional)
   * @param string $code
   *   (Optional)
   * @param string $current_trial_status
   *   (Optional)
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise.
   */
  public function searchDiseasesByGetAsync($name = NULL, $type = NULL, $type_not = NULL, $parent_ids = NULL, $ancestor_ids = NULL, $code = NULL, $current_trial_status = NULL, $sort = NULL, $order = NULL, $size = NULL) {
    return $this->searchDiseasesByGetAsyncWithHttpInfo($name, $type, $type_not, $parent_ids, $ancestor_ids, $code, $current_trial_status, $sort, $order, $size)
      ->then(
              function ($response) {
                  return $response[0];
              }
          );
  }

  /**
   * Operation searchDiseasesByGetAsyncWithHttpInfo.
   *
   * Search Diseases by GET.
   *
   * @param string $name
   *   (Optional)
   * @param string $type
   *   Type of Disease - Note that multiple values for type creates an
   *   &#x27;OR&#x27; condition for the result set. Results will meet one of
   *   the type values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27;
   *   together to further filter results. (optional)
   * @param string $type_not
   *   This will do the opposite of &#x27;type&#x27; above and exclude rather
   *   than include. Note that multiple values for type creates an
   *   &#x27;AND&#x27; condition for the result set. Results will meet all
   *   menu_not values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27;
   *   together to further filter results. (optional)
   * @param string $parent_ids
   *   Setting the parent_id value will get you a direct child along a disease
   *   path. (optional)
   * @param string $ancestor_ids
   *   Setting an ancestor_ids value will get you any of the children along a
   *   disease path. (optional)
   * @param string $code
   *   (Optional)
   * @param string $current_trial_status
   *   (Optional)
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise.
   */
  public function searchDiseasesByGetAsyncWithHttpInfo($name = NULL, $type = NULL, $type_not = NULL, $parent_ids = NULL, $ancestor_ids = NULL, $code = NULL, $current_trial_status = NULL, $sort = NULL, $order = NULL, $size = NULL) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\DiseaseCollection';
    $request = $this->searchDiseasesByGetRequest($name, $type, $type_not, $parent_ids, $ancestor_ids, $code, $current_trial_status, $sort, $order, $size);

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
   * Create request for operation 'searchDiseasesByGet'.
   *
   * @param string $name
   *   (Optional)
   * @param string $type
   *   Type of Disease - Note that multiple values for type creates an
   *   &#x27;OR&#x27; condition for the result set. Results will meet one of
   *   the type values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27;
   *   together to further filter results. (optional)
   * @param string $type_not
   *   This will do the opposite of &#x27;type&#x27; above and exclude rather
   *   than include. Note that multiple values for type creates an
   *   &#x27;AND&#x27; condition for the result set. Results will meet all
   *   menu_not values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27;
   *   together to further filter results. (optional)
   * @param string $parent_ids
   *   Setting the parent_id value will get you a direct child along a disease
   *   path. (optional)
   * @param string $ancestor_ids
   *   Setting an ancestor_ids value will get you any of the children along a
   *   disease path. (optional)
   * @param string $code
   *   (Optional)
   * @param string $current_trial_status
   *   (Optional)
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Psr7\Request
   *   The request object to be submitted.
   */
  protected function searchDiseasesByGetRequest($name = NULL, $type = NULL, $type_not = NULL, $parent_ids = NULL, $ancestor_ids = NULL, $code = NULL, $current_trial_status = NULL, $sort = NULL, $order = NULL, $size = NULL) {

    $resourcePath = '/v1/diseases';
    $formParams = [];
    $queryParams = [];
    $headerParams = [];
    $httpBody = '';
    $multipart = FALSE;

    // Query params.
    if ($name !== NULL) {
      $queryParams['name'] = ObjectSerializer::toQueryValue($name);
    }
    // Query params.
    if ($type !== NULL) {
      $queryParams['type'] = ObjectSerializer::toQueryValue($type);
    }
    // Query params.
    if ($type_not !== NULL) {
      $queryParams['type_not'] = ObjectSerializer::toQueryValue($type_not);
    }
    // Query params.
    if ($parent_ids !== NULL) {
      $queryParams['parent_ids'] = ObjectSerializer::toQueryValue($parent_ids);
    }
    // Query params.
    if ($ancestor_ids !== NULL) {
      $queryParams['ancestor_ids'] = ObjectSerializer::toQueryValue($ancestor_ids);
    }
    // Query params.
    if ($code !== NULL) {
      $queryParams['code'] = ObjectSerializer::toQueryValue($code);
    }
    // Query params.
    if ($current_trial_status !== NULL) {
      $queryParams['current_trial_status'] = ObjectSerializer::toQueryValue($current_trial_status);
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

    // For model (json/xml).
    if (isset($_tempBody)) {
      // $_tempBody is the method argument, if present.
      $httpBody = $_tempBody;
      // \stdClass has no __toString(), so we should encode it manually.
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
        // For HTTP post (form).
        $httpBody = new MultipartStream($multipartContents);

      }
      elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

      }
      else {
        // For HTTP post (form).
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
   * Search for Diseases specified in a JSON document.
   *
   * @param string $searchDocument
   *   A JSON document containing search criteria. Property names may match
   *    any of the parameters specified for searchTermsByGet().
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   *
   * @throws \InvalidArgumentException
   *
   * @return DiseaseCollection
   *   A single DiseaseCollection object containing zero or more terms matching
   *   the criteria in $searchDocument.
   */
  public function searchDiseasesByPost($searchDocument) {
    list($response) = $this->searchDiseasesByPostWithHttpInfo($searchDocument);
    return $response;
  }

  /**
   * Internals of searchTermsByPost().
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   *
   * @throws \InvalidArgumentException
   *
   * @return array
   *   Of null, HTTP status code, HTTP response headers (array of strings).
   */
  public function searchDiseasesByPostWithHttpInfo($searchDocument) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\DiseaseCollection';
    $request = $this->searchDiseasesByPostRequest($searchDocument);

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
   * Operation searchDiseasesByPostAsync.
   *
   * Search Diseases by POST.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A Promise.
   */
  public function searchDiseasesByPostAsync($searchDocument) {
    return $this->searchDiseasesByPostAsyncWithHttpInfo($searchDocument)
      ->then(
              function ($response) {
                  return $response[0];
              }
          );
  }

  /**
   * Internals for searchDiseasesByPostAsync.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   A promise.
   */
  public function searchDiseasesByPostAsyncWithHttpInfo($searchDocument) {
    $returnType = '\NCIOCPL\ClinicalTrialSearch\Model\DiseaseCollection';
    $request = $this->searchDiseasesByPostRequest($searchDocument);

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
   * Create request for operation 'searchDiseasesByPost'.
   *
   * @param string $searchDocument
   *   JSON document specifying the search criteria.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Psr7\Request
   *   The request to submit.
   */
  protected function searchDiseasesByPostRequest($searchDocument) {

    $resourcePath = '/v1/diseases';
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
