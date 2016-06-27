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
   * {@inheritdoc}
   * @param string $endpoint
   * @return \stdClass
   */
  public function doRequest($endpoint, array $parameters = array());
}
