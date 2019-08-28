# NCIOCPL\ClinicalTrialSearch\DiseasesApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**searchDiseasesByGet**](DiseasesApi.md#searchdiseasesbyget) | **GET** /v1/diseases | Search Diseases by GET
[**searchDiseasesByPost**](DiseasesApi.md#searchdiseasesbypost) | **POST** /v1/diseases | Search Diseases by POST

# **searchDiseasesByGet**
> searchDiseasesByGet($name, $type, $type_not, $parent_ids, $ancestor_ids, $code, $current_trial_status, $sort, $order, $size)

Search Diseases by GET

<h3><code>GET diseases?name=&lt;disease_name&gt;[&amp;type=&lt;disease_type&gt;]</code></h3><p>The <code>diseases</code> endpoint is intended for typeaheads and other use cases where it is necessary to search for available diseases which can later be used to filter clinical trial results. Diseases are matched partially by supplying a string to the <code>name</code> field and may be filtered by <code>menu</code> field. Results are sorted by a combination of in alphabetical order by default i.e sort is set to name and order is set to asc.</p><p>Example:<a target='_blank' href=\"/v1/diseases?type_not=subtype&type=maintype&name=A\">diseases?type_not=subtype&type=maintype&name=He</a></p><p>If you are crafting more complicated queries, it might be best to use the <code>POST</code> endpoint of the same name.</p><hr>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new NCIOCPL\ClinicalTrialSearch\DiseasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string |
$type = "type_example"; // string | Type of Disease - Note that multiple values for type creates an 'OR' condition for the result set. Results will meet one of the type values requested. Use 'type' and 'type_not' together to further filter results.
$type_not = "type_not_example"; // string | This will do the opposite of 'type' above and exclude rather than include. Note that multiple values for type creates an 'AND' condition for the result set. Results will meet all menu_not values requested. Use 'type' and 'type_not' together to further filter results.
$parent_ids = "parent_ids_example"; // string | Setting the parent_id value will get you a direct child along a disease path.
$ancestor_ids = "ancestor_ids_example"; // string | Setting an ancestor_ids value will get you any of the children along a disease path.
$code = "code_example"; // string |
$current_trial_status = "current_trial_status_example"; // string |
$sort = "sort_example"; // string | Default set to 'name'.
$order = "order_example"; // string | Asc or Desc. Default set to 'asc'.
$size = "size_example"; // string | Default set to 5.

try {
    $apiInstance->searchDiseasesByGet($name, $type, $type_not, $parent_ids, $ancestor_ids, $code, $current_trial_status, $sort, $order, $size);
} catch (Exception $e) {
    echo 'Exception when calling DiseasesApi->searchDiseasesByGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**|  | [optional]
 **type** | **string**| Type of Disease - Note that multiple values for type creates an &#x27;OR&#x27; condition for the result set. Results will meet one of the type values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27; together to further filter results. | [optional]
 **type_not** | **string**| This will do the opposite of &#x27;type&#x27; above and exclude rather than include. Note that multiple values for type creates an &#x27;AND&#x27; condition for the result set. Results will meet all menu_not values requested. Use &#x27;type&#x27; and &#x27;type_not&#x27; together to further filter results. | [optional]
 **parent_ids** | **string**| Setting the parent_id value will get you a direct child along a disease path. | [optional]
 **ancestor_ids** | **string**| Setting an ancestor_ids value will get you any of the children along a disease path. | [optional]
 **code** | **string**|  | [optional]
 **current_trial_status** | **string**|  | [optional]
 **sort** | **string**| Default set to &#x27;name&#x27;. | [optional]
 **order** | **string**| Asc or Desc. Default set to &#x27;asc&#x27;. | [optional]
 **size** | **string**| Default set to 5. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **searchDiseasesByPost**
> searchDiseasesByPost()

Search Diseases by POST

<h3><code>POST diseases</code></h3><p>Same as the <code>GET</code> endpoint, but allows you to craft a JSON body as the request.</p><p>Example:</p><code>curl -XPOST 'https://clinicaltrialsapi.cancer.gov/v1/diseases' \\<br>-H 'Content-Type: application/json' \\<br>-d '{<br>\"menu\": \"maintype\",<br>\"name\": \"He\",<br>\"current_trial_status\": [<br>\"Active\", \"Approved\"<br>]}'</code><hr>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new NCIOCPL\ClinicalTrialSearch\DiseasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $apiInstance->searchDiseasesByPost();
} catch (Exception $e) {
    echo 'Exception when calling DiseasesApi->searchDiseasesByPost: ', $e->getMessage(), PHP_EOL;
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

