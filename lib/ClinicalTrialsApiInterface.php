<?php

namespace NCIOCPL\ClinicalTrialSearch;

/**
 * Defines the interface for the the Clinical Trials API.
 */
interface ClinicalTrialsApiInterface {

  /**
   * Operation getTrialById.
   *
   * Get Trial.
   *
   * @param string $id
   *   NCI ID or NCT ID of Trial. (required)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return ClinicalTrial
   *   The matching trial.
   */
  public function getTrialById($id);

  /**
   * Operation searchTrialsByGet.
   *
   * Search Trials by GET.
   *
   * @param string $size
   *   Size of results. (optional)
   * @param string $from
   *   Starting from nth position of results lineup. (optional)
   * @param string $include
   *   Include only this attribute in trials and exclude others. (optional)
   * @param string $exclude
   *   Exclude only this attribute in trials and include others. (optional)
   * @param string $_fulltext
   *   Filter results by examining a variety of text-based fields. (optional)
   * @param string $sites_org_name_fulltext
   *   Filter results by examining words that make up organization name
   *   e.g &#x27;Mayo&#x27;. (optional)
   * @param string $_trialids
   *   Filter results by examining trial identifiers. (optional)
   * @param string $nci_id
   *   Search by NCI ID. (optional)
   * @param string $nct_id
   *   Search by NCT ID. (optional)
   * @param string $protocol_id
   *   Search by Protocol ID. (optional)
   * @param string $ccr_id
   *   Search by CCR ID. (optional)
   * @param string $ctep_id
   *   Search by CTEP ID (optional)
   * @param string $dcp_id
   *   Search by DCP ID (optional)
   * @param string $current_trial_status
   *   Current_trial_status (optional)
   * @param string $phase_phase
   *   Phase_phase (optional)
   * @param string $study_protocol_type
   *   Study_protocol_type (optional)
   * @param string $brief_title
   *   Brief_title (optional)
   * @param string $brief_summary
   *   Brief_summary (optional)
   * @param string $official_title
   *   Official_title (optional)
   * @param string $primary_purpose_primary_purpose_code
   *   Primary_purpose_primary_purpose_code (optional)
   * @param string $accepts_healthy_volunteers_indicator
   *   Accepts_healthy_volunteers_indicator (optional)
   * @param string $acronym
   *   Acronym (optional)
   * @param string $amendment_date
   *   Amendment_date (optional)
   * @param string $anatomic_sites
   *   Anatomic_sites (optional)
   * @param string $arms_arm_description
   *   Arms_arm_description (optional)
   * @param string $arms_arm_name
   *   Arms_arm_name (optional)
   * @param string $arms_arm_type
   *   Arms_arm_type (optional)
   * @param string $arms_interventions_intervention_code
   *   Arms_interventions_intervention_code (optional)
   * @param string $arms_interventions_intervention_description
   *   Arms_interventions_intervention_description (optional)
   * @param string $arms_interventions_intervention_name
   *   Arms_interventions_intervention_name (optional)
   * @param string $arms_interventions_intervention_type
   *   Arms_interventions_intervention_type (optional)
   * @param string $arms_interventions_synonyms
   *   Arms_interventions_synonyms (optional)
   * @param string $associated_studies_study_id
   *   Associated_studies_study_id (optional)
   * @param string $associated_studies_study_id_type
   *   Associated_studies_study_id_type (optional)
   * @param string $eligibility_structured_gender
   *   Eligibility_structured_gender (optional)
   * @param string $eligibility_structured_max_age_in_years_lte
   *   Eligibility_structured_max_age_in_years_lte (optional)
   * @param string $eligibility_structured_max_age_in_years_gte
   *   Eligibility_structured_max_age_in_years_gte (optional)
   * @param string $eligibility_structured_min_age_in_years_lte
   *   Eligibility_structured_min_age_in_years_lte (optional)
   * @param string $eligibility_structured_min_age_in_years_gte
   *   Eligibility_structured_min_age_in_years_gte (optional)
   * @param string $eligibility_structured_min_age_unit
   *   Eligibility_structured_min_age_unit (optional)
   * @param string $eligibility_structured_max_age_unit
   *   Eligibility_structured_max_age_unit (optional)
   * @param string $eligibility_structured_max_age_number_lte
   *   Eligibility_structured_max_age_number_lte (optional)
   * @param string $eligibility_structured_max_age_number_gte
   *   Eligibility_structured_max_age_number_gte (optional)
   * @param string $eligibility_structured_min_age_number_lte
   *   Eligibility_structured_min_age_number_lte (optional)
   * @param string $eligibility_structured_min_age_number_gte
   *   Eligibility_structured_min_age_number_gte (optional)
   * @param string $current_trial_status_date_lte
   *   Current_trial_status_date_lte (optional)
   * @param string $current_trial_status_date_gte
   *   Current_trial_status_date_gte (optional)
   * @param string $record_verification_date_lte
   *   Record_verification_date_lte (optional)
   * @param string $record_verification_date_gte
   *   Record_verification_date_gte (optional)
   * @param string $sites_org_coordinates_lat
   *   Sites_org_coordinates_lat (optional)
   * @param string $sites_org_coordinates_lon
   *   Sites_org_coordinates_lon (optional)
   * @param string $sites_org_coordinates_dist
   *   Sites_org_coordinates_dist (optional)
   * @param string $sites_contact_email
   *   Sites_contact_email (optional)
   * @param string $sites_contact_name
   *   Sites_contact_name (optional)
   * @param string $sites_contact_name__auto
   *   Sites_contact_name__auto (optional)
   * @param string $sites_contact_name__raw
   *   Sites_contact_name__raw (optional)
   * @param string $sites_contact_phone
   *   Sites_contact_phone (optional)
   * @param string $sites_generic_contact
   *   Sites_generic_contact (optional)
   * @param string $sites_org_address_line_1
   *   Sites_org_address_line_1 (optional)
   * @param string $sites_org_address_line_2
   *   Sites_org_address_line_2 (optional)
   * @param string $sites_org_city
   *   Sites_org_city (optional)
   * @param string $sites_org_postal_code
   *   Sites_org_postal_code (optional)
   * @param string $sites_org_state_or_province
   *   Sites_org_state_or_province (optional)
   * @param string $sites_org_country
   *   Sites_org_country (optional)
   * @param string $sites_org_country__raw
   *   Sites_org_country__raw (optional)
   * @param string $sites_org_email
   *   Sites_org_email (optional)
   * @param string $sites_org_family
   *   Sites_org_family (optional)
   * @param string $sites_org_fax
   *   Sites_org_fax (optional)
   * @param string $sites_org_name
   *   Sites_org_name (optional)
   * @param string $sites_org_name__auto
   *   Sites_org_name__auto (optional)
   * @param string $sites_org_name__raw
   *   Sites_org_name__raw (optional)
   * @param string $sites_org_phone
   *   Sites_org_phone (optional)
   * @param string $sites_org_status
   *   Sites_org_status (optional)
   * @param string $sites_org_status_date
   *   Sites_org_status_date (optional)
   * @param string $sites_org_to_family_relationship
   *   Sites_org_to_family_relationship (optional)
   * @param string $sites_org_tty
   *   Sites_org_tty (optional)
   * @param string $sites_recruitment_status
   *   Sites_recruitment_status (optional)
   * @param string $sites_recruitment_status_date
   *   Sites_recruitment_status_date (optional)
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return ClinicalTrialsCollection
   *   A collection of matching clinical trials
   */
  public function searchTrialsByGet($size = NULL, $from = NULL, $include = NULL, $exclude = NULL, $_fulltext = NULL, $sites_org_name_fulltext = NULL, $_trialids = NULL, $nci_id = NULL, $nct_id = NULL, $protocol_id = NULL, $ccr_id = NULL, $ctep_id = NULL, $dcp_id = NULL, $current_trial_status = NULL, $phase_phase = NULL, $study_protocol_type = NULL, $brief_title = NULL, $brief_summary = NULL, $official_title = NULL, $primary_purpose_primary_purpose_code = NULL, $accepts_healthy_volunteers_indicator = NULL, $acronym = NULL, $amendment_date = NULL, $anatomic_sites = NULL, $arms_arm_description = NULL, $arms_arm_name = NULL, $arms_arm_type = NULL, $arms_interventions_intervention_code = NULL, $arms_interventions_intervention_description = NULL, $arms_interventions_intervention_name = NULL, $arms_interventions_intervention_type = NULL, $arms_interventions_synonyms = NULL, $associated_studies_study_id = NULL, $associated_studies_study_id_type = NULL, $eligibility_structured_gender = NULL, $eligibility_structured_max_age_in_years_lte = NULL, $eligibility_structured_max_age_in_years_gte = NULL, $eligibility_structured_min_age_in_years_lte = NULL, $eligibility_structured_min_age_in_years_gte = NULL, $eligibility_structured_min_age_unit = NULL, $eligibility_structured_max_age_unit = NULL, $eligibility_structured_max_age_number_lte = NULL, $eligibility_structured_max_age_number_gte = NULL, $eligibility_structured_min_age_number_lte = NULL, $eligibility_structured_min_age_number_gte = NULL, $current_trial_status_date_lte = NULL, $current_trial_status_date_gte = NULL, $record_verification_date_lte = NULL, $record_verification_date_gte = NULL, $sites_org_coordinates_lat = NULL, $sites_org_coordinates_lon = NULL, $sites_org_coordinates_dist = NULL, $sites_contact_email = NULL, $sites_contact_name = NULL, $sites_contact_name__auto = NULL, $sites_contact_name__raw = NULL, $sites_contact_phone = NULL, $sites_generic_contact = NULL, $sites_org_address_line_1 = NULL, $sites_org_address_line_2 = NULL, $sites_org_city = NULL, $sites_org_postal_code = NULL, $sites_org_state_or_province = NULL, $sites_org_country = NULL, $sites_org_country__raw = NULL, $sites_org_email = NULL, $sites_org_family = NULL, $sites_org_fax = NULL, $sites_org_name = NULL, $sites_org_name__auto = NULL, $sites_org_name__raw = NULL, $sites_org_phone = NULL, $sites_org_status = NULL, $sites_org_status_date = NULL, $sites_org_to_family_relationship = NULL, $sites_org_tty = NULL, $sites_recruitment_status = NULL, $sites_recruitment_status_date = NULL);

  /**
   * Search for clinical trials using criteria specified in a JSON document.
   *
   * @param string $searchDocument
   *   A JSON document containing search criteria. Property names may match
   *    any of the parameters specified for searchTrialsByGet().
   *
   * @throws \NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\ApiException
   *   On non-2xx response.
   * @throws \InvalidArgumentException
   *
   * @return mixed
   *   A ClinicalTrialsCollection object.
   */
  public function searchTrialsByPost($searchDocument);

}
