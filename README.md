# NCIOCPL Clinical Trial Search Module

Provides a PHP wrapper around the [NCI Clinical Trials Search API](https://clinicaltrialsapi.cancer.gov/).

## API

The root API namespace is `NCIOCPL\ClinicalTrialSearch`

### Models

All models appear in the `NCIOCPL\ClinicalTrialSearch\Model` namespace

Please refer to [the project wiki's _Models_ page](https://github.com/NCIOCPL/cgov-clinical-trial-search/wiki/Models)
for details of the model hierarchy.

### API Methods

The complete and tested API methods are:

* `ClinicalTrialsApi`
  * `getTrialById($id)` - Retrieve the deails of a single clinical trial.
  * `searchTrialsByPost($searchDocument)` - Search for trials matching the criteria in `searchDocument`.
* `DiseasesApi`
  * `searchDiseasesByPost($searchDocument)` - Search for Diseases specified in a JSON document..
* `TermsApi`
  * `getTermByTermKey($term_key)` - Retrieves the term with supplied `term_key`.
  * `searchTermsByPost($searchDocument)` - Search for terms matching the criteria in `searchDocument`.

Pleae refer to [the project wiki's _API Classes_ page](https://github.com/NCIOCPL/cgov-clinical-trial-search/wiki/API-Classes)
for further details.

## Helpful Scripts

**Clean up**

Delete all dependency files by running:

```bash
composer cgov-clean
```

**Run Tests**

Run `phpunit` with the command:

```bash
composer test
```

## Installation

To add a dependency on the `nciocpl/clinical-trial-search` package, add the respository
to your `composer.json` file's "repositories" property.

```json
  "repositories": {
      "clinical-trial-search": {
          "type": "vcs",
          "url": "https://github.com/NCIOCPL/ClinicalTrialSearch-API"
      }
  }
```

Next, from the command line, run:
```bash
composer require nciocpl/clinical-trial-search
```

## Usage

Assuming this route is in place
```yaml
turducken.term:
  path: '/mymodule/{term}/text'
  defaults:
    _controller: '\Drupal\mymodule\Controller\MyModuleController::getTerm'
    _title: 'long description route'
  methods: [GET]
  requirements:
    _permission: 'access content'
```

Then `MyModuleController::getTerm()` might look something like this:

```php
use NCIOCPL\ClinicalTrialSearch\SwaggerGenerated\Configuration;
use NCIOCPL\ClinicalTrialSearch\TermsApi;


/**
 * Controller routines for cgov_core routes.
 */
class MyModuleController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  protected function getModuleName() {
    return 'mymodule';
  }

  public function getTerm($term) {

    if ($term == NULL) {
      throw new NotFoundHttpException();
    }

    $config = new Configuration();
    $config->setHost('https://clinicaltrialsapi.cancer.gov');

    $apiInstance = new TermsApi(NULL, $config);

    $term = $apiInstance->getTermByTermKey($term);

    if ($term != NULL) {
      $response = new Response();
      $response->headers->set('Content-Type', 'text/plain; charset=UTF-8');
      $text = 'term: \'' . $term->Term . "\n";
      $text .= 'term_key: \'' . $term->TermKey . "\n";
      $text .= 'term_type: \'' . $term->TermType . "\n";
      $response->setContent($text);
      return $response;
    }

    // Couldn't find a value to return.
    throw new NotFoundHttpException();
  }
```
