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
 * Presents methods for reetrieving Interventions.
 *
 * NOTE: This class has not been fully implemented at this time.
 */
class InterventionsApi implements InterventionsApi {
  /**
   * Global HTTP client.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $client;

  /**
   * Global configuration object.
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
   *   HTTP client for making the connection.
   * @param \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration $config
   *   Configuration object.
   * @param \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\HeaderSelector $selector
   *   Header selector.
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
   * Retrieve the configuration.
   *
   * @return \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration
   *   The configuration object.
   */
  public function getConfig() {
    return $this->config;
  }

  /**
   * Operation searchInterventionsByGet.
   *
   * Search Interventions by GET.
   *
   * @param string $name
   *   Name (optional).
   * @param string $category
   *   Category (optional).
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   * @param string $code
   *   Code (optional).
   * @param string $current_trial_status
   *   The current_trial_status (optional).
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   */
  public function searchInterventionsByGet($name = NULL, $category = NULL, $sort = NULL, $order = NULL, $size = NULL, $code = NULL, $current_trial_status = NULL) {
    $this->searchInterventionsByGetWithHttpInfo($name, $category, $sort, $order, $size, $code, $current_trial_status);
  }

  /**
   * Operation searchInterventionsByGetWithHttpInfo.
   *
   * Search Interventions by GET.
   *
   * @param string $name
   *   (Optional)
   * @param string $category
   *   (Optional)
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   * @param string $code
   *   (Optional)
   * @param string $current_trial_status
   *   (Optional)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return array
   *   Of null, HTTP status code, HTTP response headers (array of strings)
   */
  public function searchInterventionsByGetWithHttpInfo($name = NULL, $category = NULL, $sort = NULL, $order = NULL, $size = NULL, $code = NULL, $current_trial_status = NULL) {
    $returnType = '\NCIOCPL\ClinicalTrialsAPI\Client\Model\Intervention';
    $request = $this->searchInterventionsByGetRequest($name, $category, $sort, $order, $size, $code, $current_trial_status);

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
   * Operation searchInterventionsByGetAsync.
   *
   * Search Interventions by GET.
   *
   * @param string $name
   *   (Optional)
   * @param string $category
   *   (Optional)
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   * @param string $code
   *   (Optional)
   * @param string $current_trial_status
   *   (Optional)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   Promise yielding a list of Intervention objects.
   */
  public function searchInterventionsByGetAsync($name = NULL, $category = NULL, $sort = NULL, $order = NULL, $size = NULL, $code = NULL, $current_trial_status = NULL) {
    return $this->searchInterventionsByGetAsyncWithHttpInfo($name, $category, $sort, $order, $size, $code, $current_trial_status)
      ->then(
              function ($response) {
                  return $response[0];
              }
          );
  }

  /**
   * Operation searchInterventionsByGetAsyncWithHttpInfo.
   *
   * Search Interventions by GET.
   *
   * @param string $name
   *   (Optional)
   * @param string $category
   *   (Optional)
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   * @param string $code
   *   (Optional)
   * @param string $current_trial_status
   *   (Optional)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   Promise yielding a collection of Intervention objects.
   */
  public function searchInterventionsByGetAsyncWithHttpInfo($name = NULL, $category = NULL, $sort = NULL, $order = NULL, $size = NULL, $code = NULL, $current_trial_status = NULL) {
    $returnType = '\NCIOCPL\ClinicalTrialsAPI\Client\Model\Intervention';
    $request = $this->searchInterventionsByGetRequest($name, $category, $sort, $order, $size, $code, $current_trial_status);

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
   * Create request for operation 'searchInterventionsByGet'.
   *
   * @param string $name
   *   (Optional)
   * @param string $category
   *   (Optional)
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   * @param string $code
   *   (Optional)
   * @param string $current_trial_status
   *   (Optional)
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Psr7\Request
   *   HTTP request to submit.
   */
  protected function searchInterventionsByGetRequest($name = NULL, $category = NULL, $sort = NULL, $order = NULL, $size = NULL, $code = NULL, $current_trial_status = NULL) {

    $resourcePath = '/v1/interventions';
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
    if ($category !== NULL) {
      $queryParams['category'] = ObjectSerializer::toQueryValue($category);
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
    if ($code !== NULL) {
      $queryParams['code'] = ObjectSerializer::toQueryValue($code);
    }
    // Query params.
    if ($current_trial_status !== NULL) {
      $queryParams['current_trial_status'] = ObjectSerializer::toQueryValue($current_trial_status);
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
   * Operation searchInterventionsByPost.
   *
   * Search Interventions by POST.
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   */
  public function searchInterventionsByPost() {
    $this->searchInterventionsByPostWithHttpInfo();
  }

  /**
   * Operation searchInterventionsByPostWithHttpInfo.
   *
   * Search Interventions by POST.
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return array
   *   Of null, HTTP status code, HTTP response headers (array of strings)
   */
  public function searchInterventionsByPostWithHttpInfo() {
    $returnType = '\NCIOCPL\ClinicalTrialsAPI\Client\Model\Intervention';
    $request = $this->searchInterventionsByPostRequest();

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
   * Operation searchInterventionsByPostAsync.
   *
   * Search Interventions by POST.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   Promise yielding a collection of interventions.
   */
  public function searchInterventionsByPostAsync() {
    return $this->searchInterventionsByPostAsyncWithHttpInfo()
      ->then(
              function ($response) {
                  return $response[0];
              }
          );
  }

  /**
   * Operation searchInterventionsByPostAsyncWithHttpInfo.
   *
   * Search Interventions by POST.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Promise\PromiseInterface
   *   Promise yielding a collection of Interventions.
   */
  public function searchInterventionsByPostAsyncWithHttpInfo() {
    $returnType = '\NCIOCPL\ClinicalTrialsAPI\Client\Model\Intervention';
    $request = $this->searchInterventionsByPostRequest();

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
   * Create request for operation 'searchInterventionsByPost'.
   *
   * @throws \InvalidArgumentException
   *
   * @return \GuzzleHttp\Psr7\Request
   *   Request to submit.
   */
  protected function searchInterventionsByPostRequest() {

    $resourcePath = '/v1/interventions';
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
   *   Of http client options.
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
