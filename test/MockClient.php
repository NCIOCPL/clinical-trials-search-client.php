<?php

namespace Test;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

/**
 * Helper class for building Mock Guzzle clients.
 *
 * Encapsulates the logic for creating a Guzzle client and a history of
 * requests. Use MockClient::create() to get new instances.
 */
class MockClient {

  /**
   * Stores the actual GuzzleHTttp client.
   *
   * @var client
   */
  private $client = NULL;

  /**
   * Stores an array of GuzzleHttp\Psr7\Request objects.
   *
   * @var historyList
   */
  private $historyList = [];

  /**
   * Constructor.
   *
   * @param array $responseList
   *   An array of GuzzleHttp\Psr7\Response objects to be returned by
   *   consecutive client calls.
   */
  public function __construct(array $responseList) {

    // Fake HTTP Handler.
    $mock = new MockHandler($responseList);

    $handlerStack = HandlerStack::create($mock);
    $historyHandler = Middleware::history($this->historyList);
    $handlerStack->push($historyHandler);

    $this->client = new Client(['handler' => $handlerStack]);
  }

  /**
   * Returns the GuzzleHttp\Client.
   */
  public function getClient() {
    return $this->client;
  }

  /**
   * Returns request history as an array of GuzzleHttp\Psr7\Request objects.
   */
  public function getHistory() {
    return $this->historyList;
  }

}
