# NCIOCPL\ClinicalTrialSearch\ClinicalTrialsApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTrialById**](ClinicalTrialsApi.md#gettrialbyid) | **GET** /v1/clinical-trial/{id} | Get Trial
[**searchTrialsByGet**](ClinicalTrialsApi.md#searchtrialsbyget) | **GET** /v1/clinical-trials | Search Trials by GET
[**searchTrialsByPost**](ClinicalTrialsApi.md#searchtrialsbypost) | **POST** /v1/clinical-trials | Search Trials by POST

# **getTrialById**
> getTrialById($id)

Get Trial

<h3>GET clinical-trial&lt;id&gt;</h3><p>Retrieves the clinical trial with supplied <code>nci_id</code> or <code>nct_id</code>. <a target='_blank' href=\"/v1/clinical-trial.json\">All fields</a> (including nested ones) are returned.</p><p>Examples:</p><ul><li><a target='_blank' href=\"/v1/clinical-trial/NCT02194738\">clinical-trial/NCT02194738</a></li><li><a target='_blank' href=\"/v1/clinical-trial/NCI-2014-01509\">clinical-trial/NCI-2014-01509</a></li></ul><hr>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new NCIOCPL\ClinicalTrialSearch\ClinicalTrialsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | NCI ID or NCT ID of Trial.

try {
    $apiInstance->getTrialById($id);
} catch (Exception $e) {
    echo 'Exception when calling ClinicalTrialsApi->getTrialById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| NCI ID or NCT ID of Trial. |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **searchTrialsByGet**
> searchTrialsByGet($size, $from, $include, $exclude, $_fulltext, $sites_org_name_fulltext, $_trialids, $nci_id, $nct_id, $protocol_id, $ccr_id, $ctep_id, $dcp_id, $current_trial_status, $phase_phase, $study_protocol_type, $brief_title, $brief_summary, $official_title, $primary_purpose_primary_purpose_code, $accepts_healthy_volunteers_indicator, $acronym, $amendment_date, $anatomic_sites, $arms_arm_description, $arms_arm_name, $arms_arm_type, $arms_interventions_intervention_code, $arms_interventions_intervention_description, $arms_interventions_intervention_name, $arms_interventions_intervention_type, $arms_interventions_synonyms, $associated_studies_study_id, $associated_studies_study_id_type, $eligibility_structured_gender, $eligibility_structured_max_age_in_years_lte, $eligibility_structured_max_age_in_years_gte, $eligibility_structured_min_age_in_years_lte, $eligibility_structured_min_age_in_years_gte, $eligibility_structured_min_age_unit, $eligibility_structured_max_age_unit, $eligibility_structured_max_age_number_lte, $eligibility_structured_max_age_number_gte, $eligibility_structured_min_age_number_lte, $eligibility_structured_min_age_number_gte, $current_trial_status_date_lte, $current_trial_status_date_gte, $record_verification_date_lte, $record_verification_date_gte, $sites_org_coordinates_lat, $sites_org_coordinates_lon, $sites_org_coordinates_dist, $sites_contact_email, $sites_contact_name, $sites_contact_name__auto, $sites_contact_name__raw, $sites_contact_phone, $sites_generic_contact, $sites_org_address_line_1, $sites_org_address_line_2, $sites_org_city, $sites_org_postal_code, $sites_org_state_or_province, $sites_org_country, $sites_org_country__raw, $sites_org_email, $sites_org_family, $sites_org_fax, $sites_org_name, $sites_org_name__auto, $sites_org_name__raw, $sites_org_phone, $sites_org_status, $sites_org_status_date, $sites_org_to_family_relationship, $sites_org_tty, $sites_recruitment_status, $sites_recruitment_status_date)

Search Trials by GET

<h3>GET clinical-trials&lt;filter_params&gt;</h3><p>Filters all clinical trials based upon supplied filter params. Filter params may be any of the <a target='_blank' href=\"/v1/clinical-trial.json\">fields in the schema</a> as well as any of the following params...</p><p><code>size</code>: limit the amount of results a supplied amount (default is 10, max is 50)</p><p><code>from</code>: start the results from a supplied starting point (default is 0)</p><p><code>include</code>: include only the supplied filter param fields in all results (useful if you want to minimize the payload returned)</p><p><code>exclude</code>: exclude the supplied filter param fields from all results (useful if you want most of the payload returned with the exception of a few fields)</p><p><code>_fulltext</code>: filter results by examining a variety of text-based fields <i>(*_id, other_ids.value, _diseases.term, brief_title, brief_summary, official_title, detail_description, official_title, _diseases.term_fulltext, detail_description, sites.org_name_fulltext, collaborators.name_fulltext, principal_investigator_fulltext, sites.contact_name_fulltext, sites.org_city_fulltext, sites.org_state_or_province_fulltext, arms.interventions.intervention_name, biomarkers.name, biomarkers.long_name, biomarkers.synonyms)</i></p><p><code>&lt;field_param&gt;_fulltext</code>: filter results by examining the occurance in a field, of a 'word' 'begining with' the given value. <i>(_diseases.term_fulltext, _treatments_fulltext, brief_title_fulltext, collaborators.name_fulltext, principal_investigator_fulltext, lead_org_fulltext, sites.contact_name_fulltext, sites.org_name_fulltext, sites.org_city,  sites.org_state_or_province)</i></p><p><code>_trialids</code>: filter results by examining trial identifiers <i>(ccr_id, ctep_id, dcp_id, nci_id, nct_id, other_ids.value, protocol_id)</i></p><p>Example: <a target='_blank' href=\"/v1/clinical-trials?eligibility.structured.gender=female&amp;include=nct_id\">clinical-trials?eligibility.structured.gender=female&amp;include=nct_id</a></p><hr><p>When supplying an array of values for a single filter param, please use the following convention:<br> <code>clinical-trials?&lt;field_param&gt;=&lt;field_value_a&gt;&amp;&lt;field_param&gt;=&lt;field_value_b&gt;</code><br> and note that <code>string</code> field values are not case sensitive (must otherwise must match exactly).</p><hr><p>Example: <a target='_blank' href=\"/v1/clinical-trials?sites.org_state_or_province=CA&amp;sites.org_state_or_province=OR\">clinical-trials?sites.org_state_or_province=CA&amp;sites.org_state_or_province=OR</a></p><hr><p>For field params which are filtering as ranges (<code>date</code> and <code>long</code> types), please supply <code>_gte</code> or <code>_lte</code> to the end of the field param (depending on if you are filtering on greater than or equal (gte), less than or equal (lte), or both):<br> <code>clinical-trials?&lt;field_param&gt;_gte=&lt;field_value_from&gt;&amp;&lt;field_param&gt;_lte=&lt;field_value_to&gt;</code></p><p>Example: <a target='_blank' href=\"/v1/clinical-trials?record_verification_date_gte=2016-08-25\">clinical-trials?record_verification_date_gte=2016-08-25</a></p><hr><p>For field params which are geolocation coordinates (<code>geo_point</code>), please supply the following to the end of the field param:</p><ul><li><code>_lat</code> - The latitude in decimal degrees and plus/minus.</li><li><code>_lon</code> - The longitude in decimal degrees and plus/minus.</li><li><code>_dist</code> - The radius to search within. Format must be an integer followed by a unit defined as:<ul><li>mi - miles (for example <code>2mi</code>)</li><li>km - kilometer (for example <code>5km</code>)  </li></ul></li></ul><p><code>clinical-trials?&lt;field_param&gt;_lat=&lt;field_value_latitude&gt;&amp;&lt;field_param&gt;_lon=&lt;field_value_longitude&gt;&amp;&lt;field_param&gt;_dist=&lt;field_value_dist&gt;</code></p><p>Example: <a target='_blank' href=\"/v1/clinical-trials?sites.org_coordinates_lat=39.1292&amp;sites.org_coordinates_lon=-77.2953&amp;sites.org_coordinates_dist=100mi\">clinical-trials?sites.org_coordinates_lat=39.1292&amp;sites.org_coordinates_lon=-77.2953&amp;sites.org_coordinates_dist=100mi</a></p><hr><p><b>Sort order:</b><ul><li>1) sort by the study type (interventional vs non-interventional) - interventional first</li><li>2) sort by the primary purpose (treatment, supportive care, etc) - there is a list of numbers that map to the type. These numbers are sorted ascending. Treatment is the first, so it will come first.<br><br>Primary purpose sort hash values:<ul><li>treatment = 0</li><li>supportive care = 1</li><li>screening = 2</li><li>prevention = 3</li><li>diagnostic = 4</li><li>basic science = 5</li><li>health services research = 6</li><li>other = 7</li></ul></li><li>3) sort by trial status (active, enrolling by invitation, etc) - Same thing as primary purpose, there is a list of names to numbers - sorted ascending, so active comes first.<br><br>Trial status sort hash values:<ul><li>active = 0</li><li>enrolling by invitation = 1</li><li>in review = 2</li><li>approved = 3</li><li>temporarily closed to accrual = 4</li><li>temporarily closed to accrual and intervention = 5</li><li>closed to accrual and intervention = 6</li><li>closed to accrual = 7</li><li>administratively complete = 8</li><li>complete = 9</li><li>withdrawn = 10</li></ul></li><li>4) sort by location distance, nearest first (if one is entered)</li><li>5) sort by the number of active or enrolling locations - descending</li><li>6) sort by phase sort mapped values - ascending.<br><br>Phase sort hash values:<ul><li>III = 0</li><li>II_III = 1</li><li>II = 2</li><li>I_II = 3</li><li>I = 4</li><li>O = 5</li><li>IV = 6</li><li>NA = 7</li></ul></li><li>7) sort by a scoring function** - descending</li><li>8) sort by nct id - descending</li></ul></p><p>Below are some <i>examples</i> of filters for trials and configurations of results.</p><p>If you are crafting more complicated queries, it might be best to use the <code>POST</code> endpoint of the same name.</p><hr>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new NCIOCPL\ClinicalTrialSearch\ClinicalTrialsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$size = "size_example"; // string | Size of results.
$from = "from_example"; // string | Starting from nth position of results lineup.
$include = "include_example"; // string | Include only this attribute in trials and exclude others.
$exclude = "exclude_example"; // string | Exclude only this attribute in trials and include others.
$_fulltext = "_fulltext_example"; // string | filter results by examining a variety of text-based fields.
$sites_org_name_fulltext = "sites_org_name_fulltext_example"; // string | filter results by examining words that make up organization name e.g 'Mayo'.
$_trialids = "_trialids_example"; // string | filter results by examining trial identifiers.
$nci_id = "nci_id_example"; // string | Search by NCI ID.
$nct_id = "nct_id_example"; // string | Search by NCT ID.
$protocol_id = "protocol_id_example"; // string | Search by Protocol ID.
$ccr_id = "ccr_id_example"; // string | Search by CCR ID.
$ctep_id = "ctep_id_example"; // string | Search by CTEP ID
$dcp_id = "dcp_id_example"; // string | Search by DCP ID
$current_trial_status = "current_trial_status_example"; // string |
$phase_phase = "phase_phase_example"; // string |
$study_protocol_type = "study_protocol_type_example"; // string |
$brief_title = "brief_title_example"; // string |
$brief_summary = "brief_summary_example"; // string |
$official_title = "official_title_example"; // string |
$primary_purpose_primary_purpose_code = "primary_purpose_primary_purpose_code_example"; // string |
$accepts_healthy_volunteers_indicator = "accepts_healthy_volunteers_indicator_example"; // string |
$acronym = "acronym_example"; // string |
$amendment_date = "amendment_date_example"; // string |
$anatomic_sites = "anatomic_sites_example"; // string |
$arms_arm_description = "arms_arm_description_example"; // string |
$arms_arm_name = "arms_arm_name_example"; // string |
$arms_arm_type = "arms_arm_type_example"; // string |
$arms_interventions_intervention_code = "arms_interventions_intervention_code_example"; // string |
$arms_interventions_intervention_description = "arms_interventions_intervention_description_example"; // string |
$arms_interventions_intervention_name = "arms_interventions_intervention_name_example"; // string |
$arms_interventions_intervention_type = "arms_interventions_intervention_type_example"; // string |
$arms_interventions_synonyms = "arms_interventions_synonyms_example"; // string |
$associated_studies_study_id = "associated_studies_study_id_example"; // string |
$associated_studies_study_id_type = "associated_studies_study_id_type_example"; // string |
$eligibility_structured_gender = "eligibility_structured_gender_example"; // string |
$eligibility_structured_max_age_in_years_lte = "eligibility_structured_max_age_in_years_lte_example"; // string |
$eligibility_structured_max_age_in_years_gte = "eligibility_structured_max_age_in_years_gte_example"; // string |
$eligibility_structured_min_age_in_years_lte = "eligibility_structured_min_age_in_years_lte_example"; // string |
$eligibility_structured_min_age_in_years_gte = "eligibility_structured_min_age_in_years_gte_example"; // string |
$eligibility_structured_min_age_unit = "eligibility_structured_min_age_unit_example"; // string |
$eligibility_structured_max_age_unit = "eligibility_structured_max_age_unit_example"; // string |
$eligibility_structured_max_age_number_lte = "eligibility_structured_max_age_number_lte_example"; // string |
$eligibility_structured_max_age_number_gte = "eligibility_structured_max_age_number_gte_example"; // string |
$eligibility_structured_min_age_number_lte = "eligibility_structured_min_age_number_lte_example"; // string |
$eligibility_structured_min_age_number_gte = "eligibility_structured_min_age_number_gte_example"; // string |
$current_trial_status_date_lte = "current_trial_status_date_lte_example"; // string |
$current_trial_status_date_gte = "current_trial_status_date_gte_example"; // string |
$record_verification_date_lte = "record_verification_date_lte_example"; // string |
$record_verification_date_gte = "record_verification_date_gte_example"; // string |
$sites_org_coordinates_lat = "sites_org_coordinates_lat_example"; // string |
$sites_org_coordinates_lon = "sites_org_coordinates_lon_example"; // string |
$sites_org_coordinates_dist = "sites_org_coordinates_dist_example"; // string |
$sites_contact_email = "sites_contact_email_example"; // string |
$sites_contact_name = "sites_contact_name_example"; // string |
$sites_contact_name__auto = "sites_contact_name__auto_example"; // string |
$sites_contact_name__raw = "sites_contact_name__raw_example"; // string |
$sites_contact_phone = "sites_contact_phone_example"; // string |
$sites_generic_contact = "sites_generic_contact_example"; // string |
$sites_org_address_line_1 = "sites_org_address_line_1_example"; // string |
$sites_org_address_line_2 = "sites_org_address_line_2_example"; // string |
$sites_org_city = "sites_org_city_example"; // string |
$sites_org_postal_code = "sites_org_postal_code_example"; // string |
$sites_org_state_or_province = "sites_org_state_or_province_example"; // string |
$sites_org_country = "sites_org_country_example"; // string |
$sites_org_country__raw = "sites_org_country__raw_example"; // string |
$sites_org_email = "sites_org_email_example"; // string |
$sites_org_family = "sites_org_family_example"; // string |
$sites_org_fax = "sites_org_fax_example"; // string |
$sites_org_name = "sites_org_name_example"; // string |
$sites_org_name__auto = "sites_org_name__auto_example"; // string |
$sites_org_name__raw = "sites_org_name__raw_example"; // string |
$sites_org_phone = "sites_org_phone_example"; // string |
$sites_org_status = "sites_org_status_example"; // string |
$sites_org_status_date = "sites_org_status_date_example"; // string |
$sites_org_to_family_relationship = "sites_org_to_family_relationship_example"; // string |
$sites_org_tty = "sites_org_tty_example"; // string |
$sites_recruitment_status = "sites_recruitment_status_example"; // string |
$sites_recruitment_status_date = "sites_recruitment_status_date_example"; // string |

try {
    $apiInstance->searchTrialsByGet($size, $from, $include, $exclude, $_fulltext, $sites_org_name_fulltext, $_trialids, $nci_id, $nct_id, $protocol_id, $ccr_id, $ctep_id, $dcp_id, $current_trial_status, $phase_phase, $study_protocol_type, $brief_title, $brief_summary, $official_title, $primary_purpose_primary_purpose_code, $accepts_healthy_volunteers_indicator, $acronym, $amendment_date, $anatomic_sites, $arms_arm_description, $arms_arm_name, $arms_arm_type, $arms_interventions_intervention_code, $arms_interventions_intervention_description, $arms_interventions_intervention_name, $arms_interventions_intervention_type, $arms_interventions_synonyms, $associated_studies_study_id, $associated_studies_study_id_type, $eligibility_structured_gender, $eligibility_structured_max_age_in_years_lte, $eligibility_structured_max_age_in_years_gte, $eligibility_structured_min_age_in_years_lte, $eligibility_structured_min_age_in_years_gte, $eligibility_structured_min_age_unit, $eligibility_structured_max_age_unit, $eligibility_structured_max_age_number_lte, $eligibility_structured_max_age_number_gte, $eligibility_structured_min_age_number_lte, $eligibility_structured_min_age_number_gte, $current_trial_status_date_lte, $current_trial_status_date_gte, $record_verification_date_lte, $record_verification_date_gte, $sites_org_coordinates_lat, $sites_org_coordinates_lon, $sites_org_coordinates_dist, $sites_contact_email, $sites_contact_name, $sites_contact_name__auto, $sites_contact_name__raw, $sites_contact_phone, $sites_generic_contact, $sites_org_address_line_1, $sites_org_address_line_2, $sites_org_city, $sites_org_postal_code, $sites_org_state_or_province, $sites_org_country, $sites_org_country__raw, $sites_org_email, $sites_org_family, $sites_org_fax, $sites_org_name, $sites_org_name__auto, $sites_org_name__raw, $sites_org_phone, $sites_org_status, $sites_org_status_date, $sites_org_to_family_relationship, $sites_org_tty, $sites_recruitment_status, $sites_recruitment_status_date);
} catch (Exception $e) {
    echo 'Exception when calling ClinicalTrialsApi->searchTrialsByGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **size** | **string**| Size of results. | [optional]
 **from** | **string**| Starting from nth position of results lineup. | [optional]
 **include** | **string**| Include only this attribute in trials and exclude others. | [optional]
 **exclude** | **string**| Exclude only this attribute in trials and include others. | [optional]
 **_fulltext** | **string**| filter results by examining a variety of text-based fields. | [optional]
 **sites_org_name_fulltext** | **string**| filter results by examining words that make up organization name e.g &#x27;Mayo&#x27;. | [optional]
 **_trialids** | **string**| filter results by examining trial identifiers. | [optional]
 **nci_id** | **string**| Search by NCI ID. | [optional]
 **nct_id** | **string**| Search by NCT ID. | [optional]
 **protocol_id** | **string**| Search by Protocol ID. | [optional]
 **ccr_id** | **string**| Search by CCR ID. | [optional]
 **ctep_id** | **string**| Search by CTEP ID | [optional]
 **dcp_id** | **string**| Search by DCP ID | [optional]
 **current_trial_status** | **string**|  | [optional]
 **phase_phase** | **string**|  | [optional]
 **study_protocol_type** | **string**|  | [optional]
 **brief_title** | **string**|  | [optional]
 **brief_summary** | **string**|  | [optional]
 **official_title** | **string**|  | [optional]
 **primary_purpose_primary_purpose_code** | **string**|  | [optional]
 **accepts_healthy_volunteers_indicator** | **string**|  | [optional]
 **acronym** | **string**|  | [optional]
 **amendment_date** | **string**|  | [optional]
 **anatomic_sites** | **string**|  | [optional]
 **arms_arm_description** | **string**|  | [optional]
 **arms_arm_name** | **string**|  | [optional]
 **arms_arm_type** | **string**|  | [optional]
 **arms_interventions_intervention_code** | **string**|  | [optional]
 **arms_interventions_intervention_description** | **string**|  | [optional]
 **arms_interventions_intervention_name** | **string**|  | [optional]
 **arms_interventions_intervention_type** | **string**|  | [optional]
 **arms_interventions_synonyms** | **string**|  | [optional]
 **associated_studies_study_id** | **string**|  | [optional]
 **associated_studies_study_id_type** | **string**|  | [optional]
 **eligibility_structured_gender** | **string**|  | [optional]
 **eligibility_structured_max_age_in_years_lte** | **string**|  | [optional]
 **eligibility_structured_max_age_in_years_gte** | **string**|  | [optional]
 **eligibility_structured_min_age_in_years_lte** | **string**|  | [optional]
 **eligibility_structured_min_age_in_years_gte** | **string**|  | [optional]
 **eligibility_structured_min_age_unit** | **string**|  | [optional]
 **eligibility_structured_max_age_unit** | **string**|  | [optional]
 **eligibility_structured_max_age_number_lte** | **string**|  | [optional]
 **eligibility_structured_max_age_number_gte** | **string**|  | [optional]
 **eligibility_structured_min_age_number_lte** | **string**|  | [optional]
 **eligibility_structured_min_age_number_gte** | **string**|  | [optional]
 **current_trial_status_date_lte** | **string**|  | [optional]
 **current_trial_status_date_gte** | **string**|  | [optional]
 **record_verification_date_lte** | **string**|  | [optional]
 **record_verification_date_gte** | **string**|  | [optional]
 **sites_org_coordinates_lat** | **string**|  | [optional]
 **sites_org_coordinates_lon** | **string**|  | [optional]
 **sites_org_coordinates_dist** | **string**|  | [optional]
 **sites_contact_email** | **string**|  | [optional]
 **sites_contact_name** | **string**|  | [optional]
 **sites_contact_name__auto** | **string**|  | [optional]
 **sites_contact_name__raw** | **string**|  | [optional]
 **sites_contact_phone** | **string**|  | [optional]
 **sites_generic_contact** | **string**|  | [optional]
 **sites_org_address_line_1** | **string**|  | [optional]
 **sites_org_address_line_2** | **string**|  | [optional]
 **sites_org_city** | **string**|  | [optional]
 **sites_org_postal_code** | **string**|  | [optional]
 **sites_org_state_or_province** | **string**|  | [optional]
 **sites_org_country** | **string**|  | [optional]
 **sites_org_country__raw** | **string**|  | [optional]
 **sites_org_email** | **string**|  | [optional]
 **sites_org_family** | **string**|  | [optional]
 **sites_org_fax** | **string**|  | [optional]
 **sites_org_name** | **string**|  | [optional]
 **sites_org_name__auto** | **string**|  | [optional]
 **sites_org_name__raw** | **string**|  | [optional]
 **sites_org_phone** | **string**|  | [optional]
 **sites_org_status** | **string**|  | [optional]
 **sites_org_status_date** | **string**|  | [optional]
 **sites_org_to_family_relationship** | **string**|  | [optional]
 **sites_org_tty** | **string**|  | [optional]
 **sites_recruitment_status** | **string**|  | [optional]
 **sites_recruitment_status_date** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **searchTrialsByPost**
> searchTrialsByPost()

Search Trials by POST

<h3><code>POST clinical-trials</code></h3><p>Same as the <code>GET</code> endpoint, but allows you to craft a JSON body as the request.</p><p>Example:</p><code>curl -XPOST 'https://clinicaltrialsapi.cancer.gov/v1/clinical-trials' \\<br>-H 'Content-Type: application/json' \\<br>-d '{<br>\"sites.org_state_or_province\": [\"CA\", \"OR\"],<br>\"record_verification_date_gte\": \"2016-06-01\",<br>\"include\": [\"nci_id\"]<br> }'</code>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new NCIOCPL\ClinicalTrialSearch\ClinicalTrialsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $apiInstance->searchTrialsByPost();
} catch (Exception $e) {
    echo 'Exception when calling ClinicalTrialsApi->searchTrialsByPost: ', $e->getMessage(), PHP_EOL;
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

