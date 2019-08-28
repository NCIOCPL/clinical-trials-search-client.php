<?php

namespace NCIOCPL\ClinicalTrialSearch;

/**
 * Defines the interface for the the Interventions API.
 */
interface InterventionsApiInterface {

  /**
   * Operation searchInterventionsByGet.
   *
   * Search Interventions by GET.
   *
   * @param string $name
   *   Name (optional)
   * @param string $category
   *   Category (optional)
   * @param string $sort
   *   Default set to &#x27;name&#x27;. (optional)
   * @param string $order
   *   Asc or Desc. Default set to &#x27;asc&#x27;. (optional)
   * @param string $size
   *   Default set to 5. (optional)
   * @param string $code
   *   Code (optional)
   * @param string $current_trial_status
   *   Current_trial_status (optional)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   */
  public function searchInterventionsByGet($name = NULL, $category = NULL, $sort = NULL, $order = NULL, $size = NULL, $code = NULL, $current_trial_status = NULL);

  /**
   * Operation searchInterventionsByPost.
   *
   * Search Interventions by POST.
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   */
  public function searchInterventionsByPost();

}
