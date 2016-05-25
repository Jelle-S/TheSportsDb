<?php
/**
 * @file
 * Contains \TheSportsDb\Query\LeagueQuery.
 */

namespace TheSportsDb\Query;

/**
 * The default LeagueQuery implementation.
 *
 * @author Jelle Sebreghts
 */
class LeagueQuery extends Query implements LeagueQueryInterface {

  /**
   * {@inheritdoc}
   */
  public function all() {
    $leagues_data = $this->sportsDbClient->doRequest('all_leagues.php');
    $leagues = array();
    foreach ($leagues_data->leagues as $league) {
      if (!isset($leagues[$league->idLeague])) {
        $leagues[$league->idLeague] = $this->factory->create($league);
      }
    }
    return $leagues;
  }
}
