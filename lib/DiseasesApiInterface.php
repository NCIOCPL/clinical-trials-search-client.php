<?php

namespace NCIOCPL\ClinicalTrialSearch;

/**
 * Defines the interface for the the Diseases API.
 */
interface DiseasesApiInterface {

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
   * @throws \InvalidArgumentException
   */
  public function searchDiseasesByGet($name = NULL, $type = NULL, $type_not = NULL, $parent_ids = NULL, $ancestor_ids = NULL, $code = NULL, $current_trial_status = NULL, $sort = NULL, $order = NULL, $size = NULL);

  /**
   * Operation searchDiseasesByPost.
   *
   * Search Diseases by POST.
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   */
  public function searchDiseasesByPost();

}
