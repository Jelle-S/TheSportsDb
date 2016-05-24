<?php
/**
 * @file
 * Contains \TheSportsDb\Http\TheSportsDbClient.
 */
namespace TheSportsDb\Http;

use GuzzleHttp\ClientInterface;
use TheSportsDb\Exception\TheSportsDbException;

/**
 * Http client for thesportsdb.
 *
 * @author Jelle Sebreghts
 */
class TheSportsDbClient implements TheSportsDbClientInterface {

  /**
   * The API key.
   *
   * @var string
   */
  protected $apiKey;

  /**
   * HTTP Client to fetch data.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  /**
   * Creates a \TheSportsDb\Http\TheSportsDbClient object.
   *
   * @param string $apiKey
   *   The api key to connect to the sports db service.
   * @param ClientInterface $httpClient
   *   The HTTP client that will make the requests.
   */
  public function __construct($apiKey, ClientInterface $httpClient) {
    $this->apiKey = $apiKey;
    $this->httpClient = $httpClient;
  }

  /**
   * Get the base url for requests.
   *
   * @return string
   */
  protected function getBaseUrl() {
    return 'http://thesportsdb.com/api/v1/json/' . $this->apiKey . '/';
  }

  /**
   * Makes a request to the sports db.
   * 
   * @param string $endpoint
   *   The endpoint for the request.
   * @param array $parameters
   *   The parameters for this request.
   * 
   * @return \stdClass
   * 
   * @throws TheSportsDbException
   */
  public function doRequest($endpoint, array $parameters = array()) {
    $url = $this->getBaseUrl() . $endpoint;
    $response = $this->httpClient->request('GET', $url, array('query' => $parameters));
    if ($response->getStatusCode() == 200) {
      return json_decode($response->getBody()->getContents());
    }
    throw new TheSportsDbException('Request to ' . $url . ' failed: ' . $response->getReasonPhrase());
  }

}
