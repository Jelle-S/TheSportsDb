<?php
/**
 * @file
 * Contains \TheSportsDb\PropertyMapper\SportPropertyMapper.
 */

namespace TheSportsDb\PropertyMapper;

use TheSportsDb\Factory\FactoryInterface;

/**
 * Property mapper for sports.
 *
 * @author Jelle Sebreghts
 */
class SportPropertyMapper extends AbstractPropertyMapper {

  /**
   * {@inheritdoc}
   */
  protected $propertyMap = array(
    'id' => 'strSport',
    'name' => 'strSport',
    'leagues' => 'leagues',
  );

  /**
   * {@inheritdoc}
   */
  protected $propertyCallbacks = array(
    'leagues' => 'mapLeagues',
  );
  
  /**
   * The league factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $leagueFactory;

  protected $destinationClass = 'TheSportsDb\Entity\Sport';

  public function setLeagueFactory(FactoryInterface $leagueFactory) {
    $this->leagueFactory = $leagueFactory;
  }

  public function mapLeagues(array $leagues, \stdClass $values, $reverse = FALSE) {
    if (!$reverse) {
      if (!($this->leagueFactory instanceof FactoryInterface)) {
        throw new \Exception('No league factory set.');
      }
      $mapped_leagues = array();
      foreach ($leagues as $league_data) {
        $league = $this->leagueFactory->create($league_data);
        $mapped_leagues[$league->getId()] = $league;
      }
      return $mapped_leagues;
    }
    $mapped_leagues = array();
    foreach ($leagues as $league) {
      $mapped_leagues[] = (object) array('idLeague' => $league->getId());
    }
    return $mapped_leagues;
  }

}
