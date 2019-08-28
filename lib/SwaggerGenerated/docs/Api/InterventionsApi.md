# NCIOCPL\ClinicalTrialSearch\InterventionsApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**searchInterventionsByGet**](InterventionsApi.md#searchinterventionsbyget) | **GET** /v1/interventions | Search Interventions by GET
[**searchInterventionsByPost**](InterventionsApi.md#searchinterventionsbypost) | **POST** /v1/interventions | Search Interventions by POST

# **searchInterventionsByGet**
> searchInterventionsByGet($name, $category, $sort, $order, $size, $code, $current_trial_status)

Search Interventions by GET

<h3><code>GET interventions?name=&lt;intervention_name&gt;[&amp;category=&lt;category_name&gt;]</code></h3><p>The <code>interventions</code> endpoint is intended for typeaheads and other use cases where it is necessary to search for available interventions which can later be used to filter clinical trial results. Interventions are matched partially by supplying a string to the <code>name</code> field and may be filtered by <code>category</code> field. Results are sorted by a combination of in alphabetical order by default i.e sort is set to name and order is set to asc.</p><p>Example:<a target='_blank' href=\"/v1/interventions?category=agent%20category&name=Therapeutic\">interventions?category=agent%20category&name=Therapeutic</a></p><p>If you are crafting more complicated queries, it might be best to use the <code>POST</code> endpoint of the same name.</p><hr>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new NCIOCPL\ClinicalTrialSearch\InterventionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string |
$category = "category_example"; // string |
$sort = "sort_example"; // string | Default set to 'name'.
$order = "order_example"; // string | Asc or Desc. Default set to 'asc'.
$size = "size_example"; // string | Default set to 5.
$code = "code_example"; // string |
$current_trial_status = "current_trial_status_example"; // string |

try {
    $apiInstance->searchInterventionsByGet($name, $category, $sort, $order, $size, $code, $current_trial_status);
} catch (Exception $e) {
    echo 'Exception when calling InterventionsApi->searchInterventionsByGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**|  | [optional]
 **category** | **string**|  | [optional]
 **sort** | **string**| Default set to &#x27;name&#x27;. | [optional]
 **order** | **string**| Asc or Desc. Default set to &#x27;asc&#x27;. | [optional]
 **size** | **string**| Default set to 5. | [optional]
 **code** | **string**|  | [optional]
 **current_trial_status** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **searchInterventionsByPost**
> searchInterventionsByPost()

Search Interventions by POST

<h3><code>POST interventions</code></h3><p>Same as the <code>GET</code> endpoint, but allows you to craft a JSON body as the request.</p><p>Example:</p><code>curl -XPOST 'https://clinicaltrialsapi.cancer.gov/v1/interventions' \\<br>-H 'Content-Type: application/json' \\<br>-d '{<br>\"category\": \"agent\",<br>\"name\": \"Barseb-HC\",<br>\"current_trial_status\": [<br>\"Active\", \"Approved\"<br>]}'</code><hr>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new NCIOCPL\ClinicalTrialSearch\InterventionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $apiInstance->searchInterventionsByPost();
} catch (Exception $e) {
    echo 'Exception when calling InterventionsApi->searchInterventionsByPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

