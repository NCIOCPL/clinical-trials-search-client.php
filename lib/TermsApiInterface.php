<?php

namespace NCIOCPL\ClinicalTrialSearch;

/**
 * Defines the interface for the the Terms API.
 */
interface TermsApiInterface {

  /**
   * Operation getTermByTermKey.
   *
   * Get Term by 'term_key' value.
   *
   * @param string $term_key
   *   Key for finding the term. (required)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return \NCIOCPL\ClinicalTrialSearch\Model\Term
   *   The requsted Term. An empty term if the requested term does not exist.
   */
  public function getTermByTermKey($term_key);

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
   *   From (optional)
   * @param string $codes
   *   Used with _diseases (optional)
   * @param string $current_trial_statuses
   *   Current_trial_statuses (optional)
   * @param string $org_country
   *   Org_country (optional)
   * @param string $org_state_or_province
   *   Org_state_or_province (optional)
   * @param string $org_city
   *   Org_city (optional)
   * @param string $org_postal_code
   *   Org_postal_code (optional)
   * @param string $org_to_family_relationship
   *   Org Family Relationship: To be used with _orgs_by_location to set family
   *   relationship (optional)
   * @param string $org_coordinates_lon
   *   Longitude: To be used with _orgs_by_location to set longitude (optional)
   * @param string $org_coordinates_lat
   *   Latitude: To be used with _orgs_by_location to set latitude (optional)
   * @param string $org_coordinates_dist
   *   Distance (in miles): To be used with _orgs_by_location to find distance
   *   from coordinates OR postal code (optional)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   */
  public function searchTermsByGet($term = NULL, $term_type = NULL, $sort = NULL, $order = NULL, $size = NULL, $from = NULL, $codes = NULL, $current_trial_statuses = NULL, $org_country = NULL, $org_state_or_province = NULL, $org_city = NULL, $org_postal_code = NULL, $org_to_family_relationship = NULL, $org_coordinates_lon = NULL, $org_coordinates_lat = NULL, $org_coordinates_dist = NULL);

  /**
   * Operation searchTermsByPostWithHttpInfo.
   *
   * Search Terms by POST.
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return array
   *   Of null, HTTP status code, HTTP response headers (array of strings)
   */
  public function searchTermsByPost($searchDocument);

}
