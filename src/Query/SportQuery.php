<?php
/**
 * @file
 * Contains \TheSportsDb\Query\SportQuery.
 */

namespace TheSportsDb\Query;

/**
 * The default SportQuery implementation.
 *
 * @author Jelle Sebreghts
 */
class SportQuery extends Query implements SportQueryInterface {

  /**
   * {@inheritdoc}
   */
  public function byId($id) {
    return $this->factory->create($this->factory->reverseMapProperties((object) array('id' => $id, 'name' => $id)));
  }

  /**
   * {@inheritdoc}
   */
  public function all() {
    $data = $this->sportsDbClient->doRequest('all_leagues.php');
    $sports = array();
    foreach ($data->leagues as $league) {
      if (!isset($sports[$league->strSport])) {
        $sports[$league->strSport] = $this->factory->create((object) array('strSport' => $league->strSport));
      }
    }
    return $sports;
  }
}
