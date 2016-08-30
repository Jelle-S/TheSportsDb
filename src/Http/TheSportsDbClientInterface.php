<?php
/**
 * @file
 * Contains \TheSportsDb\Http\TheSportsDbClientInterface.
 */

namespace TheSportsDb\Http;

/**
 * Interface for sports db http clients.
 *
 * @author Jelle Sebreghts
 */
interface TheSportsDbClientInterface {

  /**
   * Do a request.
   *
   * @param string $endpoint
   *   The endpoint to do the request to.
   * @param array $parameters
   *   Paramters to pass with the request.
   *
   * @return \stdClass
   *   The response data.
   *
   * @throws \Exception
   *   When the request fails.
   */
  public function doRequest($endpoint, array $parameters = array());
}
