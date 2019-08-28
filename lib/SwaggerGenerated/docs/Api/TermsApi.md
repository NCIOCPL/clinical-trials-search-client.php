# NCIOCPL\ClinicalTrialSearch\TermsApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTermByTermKey**](TermsApi.md#gettermbytermkey) | **GET** /v1/term/{term_key} | Get Term by &#x27;term_key&#x27; value
[**searchTermsByGet**](TermsApi.md#searchtermsbyget) | **GET** /v1/terms | Search Terms by GET
[**searchTermsByPost**](TermsApi.md#searchtermsbypost) | **POST** /v1/terms | Search Terms by POST

# **getTermByTermKey**
> getTermByTermKey($term_key)

Get Term by 'term_key' value

<h3>GET term&lt;term_key&gt;</h3><p>Retrieves the term with supplied <code>term_key</code>.</p><p>Example:</p><p><a target='_blank' href=\"/v1/term/acute_myeloid_leukemia_in_remission\">Term with term_key value of acute_myeloid_leukemia_in_remission</a>.</p><hr>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new NCIOCPL\ClinicalTrialSearch\TermsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$term_key = "term_key_example"; // string | 'term_key' value of term.

try {
    $apiInstance->getTermByTermKey($term_key);
} catch (Exception $e) {
    echo 'Exception when calling TermsApi->getTermByTermKey: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **term_key** | **string**| &#x27;term_key&#x27; value of term. |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **searchTermsByGet**
> searchTermsByGet($term, $term_type, $sort, $order, $size, $from, $codes, $current_trial_statuses, $org_country, $org_state_or_province, $org_city, $org_postal_code, $org_to_family_relationship, $org_coordinates_lon, $org_coordinates_lat, $org_coordinates_dist)

Search Terms by GET

<h3><code>GET terms?term=&lt;search_term&gt;[&amp;term_type=&lt;search_term_type&gt;]</code></h3><p>The <code>terms</code> endpoint is intended for typeaheads and other use cases where it is necessary to search for available terms which can later be used to filter clinical trial results. Terms are matched partially by supplying a string to the <code>term</code> field and may be filtered by clinical trial type using the <code>term_type</code> field. Results are sorted by a combination of string relevancy and popularity.</p><p>Example:<a target='_blank' href=\"/v1/terms?term=pancreatic%20n\">terms?term=pancreatic%20n</a></p><ul>List of Exposed Term Types:<li>_diseases</li><li>_treatments</li><li>_locations</li><li>_org_state_or_provinces</li><li>_org_cities</li><li>_orgs_by_location</li><li>sites.org_postal_code</li><li>sites.org_country</li><li>sites.org_city</li><li>sites.org_state_or_province</li><li>sites.org_name</li><li>sites.org_family</li><li>current_trial_status</li><li>phase.phase</li><li>study_protocol_type</li><li>brief_title</li><li>brief_summary</li><li>official_title</li><li>arms.interventions.synonyms</li><li>sites.org_to_family_relationship</li><li>anatomic_sites</li><li>arms.interventions.intervention_type</li><li>primary_purpose.primary_purpose_code</li><li>arms.interventions.intervention_code</li><li>principal_investigator</li><li>lead_org</li></ul><p>If you are crafting more complicated queries, it might be best to use the <code>POST</code> endpoint of the same name.</p><hr>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new NCIOCPL\ClinicalTrialSearch\TermsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$term = "term_example"; // string |
$term_type = "term_type_example"; // string |
$sort = "sort_example"; // string | Sort by 'term' if sort is default alphabetically asc or 'count' by occurance default desc otherwise use order.
$order = "order_example"; // string | Asc or Desc.
$size = "size_example"; // string |
$from = "from_example"; // string |
$codes = "codes_example"; // string | Used with _diseases
$current_trial_statuses = "current_trial_statuses_example"; // string |
$org_country = "org_country_example"; // string |
$org_state_or_province = "org_state_or_province_example"; // string |
$org_city = "org_city_example"; // string |
$org_postal_code = "org_postal_code_example"; // string |
$org_to_family_relationship = "org_to_family_relationship_example"; // string | Org Family Relationship: To be used with _orgs_by_location to set family relationship
$org_coordinates_lon = "org_coordinates_lon_example"; // string | Longitude: To be used with _orgs_by_location to set longitude
$org_coordinates_lat = "org_coordinates_lat_example"; // string | Latitude: To be used with _orgs_by_location to set latitude
$org_coordinates_dist = "org_coordinates_dist_example"; // string | Distance (in miles): To be used with _orgs_by_location to find distance from coordinates OR postal code

try {
    $apiInstance->searchTermsByGet($term, $term_type, $sort, $order, $size, $from, $codes, $current_trial_statuses, $org_country, $org_state_or_province, $org_city, $org_postal_code, $org_to_family_relationship, $org_coordinates_lon, $org_coordinates_lat, $org_coordinates_dist);
} catch (Exception $e) {
    echo 'Exception when calling TermsApi->searchTermsByGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **term** | **string**|  | [optional]
 **term_type** | **string**|  | [optional]
 **sort** | **string**| Sort by &#x27;term&#x27; if sort is default alphabetically asc or &#x27;count&#x27; by occurance default desc otherwise use order. | [optional]
 **order** | **string**| Asc or Desc. | [optional]
 **size** | **string**|  | [optional]
 **from** | **string**|  | [optional]
 **codes** | **string**| Used with _diseases | [optional]
 **current_trial_statuses** | **string**|  | [optional]
 **org_country** | **string**|  | [optional]
 **org_state_or_province** | **string**|  | [optional]
 **org_city** | **string**|  | [optional]
 **org_postal_code** | **string**|  | [optional]
 **org_to_family_relationship** | **string**| Org Family Relationship: To be used with _orgs_by_location to set family relationship | [optional]
 **org_coordinates_lon** | **string**| Longitude: To be used with _orgs_by_location to set longitude | [optional]
 **org_coordinates_lat** | **string**| Latitude: To be used with _orgs_by_location to set latitude | [optional]
 **org_coordinates_dist** | **string**| Distance (in miles): To be used with _orgs_by_location to find distance from coordinates OR postal code | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **searchTermsByPost**
> searchTermsByPost()

Search Terms by POST

<h3><code>POST terms</code></h3><p>Same as the <code>GET</code> endpoint, but allows you to craft a JSON body as the request.</p><p>Example:</p><code>curl -XPOST 'https://clinicaltrialsapi.cancer.gov/v1/terms' \\<br>-H 'Content-Type: application/json' \\<br>-d '{<br>\"term_type\": \"_orgs_by_location\",<br>\"org_postal_code\": \"20910\",<br>\"org_coordinates_dist\": 10,<br>\"org_to_family_relationship\": \"organizational\"<br>}'</code><hr>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new NCIOCPL\ClinicalTrialSearch\TermsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $apiInstance->searchTermsByPost();
} catch (Exception $e) {
    echo 'Exception when calling TermsApi->searchTermsByPost: ', $e->getMessage(), PHP_EOL;
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

