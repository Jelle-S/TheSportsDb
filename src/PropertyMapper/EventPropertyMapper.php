<?php
/**
 * @file
 * Contains \TheSportsDb\PropertyMapper\EventPropertyMapper.
 */

namespace TheSportsDb\PropertyMapper;

use TheSportsDb\Factory\FactoryInterface;

/**
 * Property mapper for season.
 *
 * @author Jelle Sebreghts
 */
class EventPropertyMapper extends AbstractPropertyMapper {

  /**
   * {@inheritdoc}
   */
  protected $propertyMap = array(
    'id' => 'idEvent',
    'name' => 'strEvent',
    'filename' => 'strFilename',
    'league' => 'idLeague',
    'season' => 'strSeason',
    'description' => 'strDescriptionEN',
    'homeScore' => 'intHomeScore',
    'round' => 'intRound',
    'awayScore' => 'intAwayScore',
    'specators' => 'intSpectators',
    'homeGoalDetails' => 'strHomeGoalDetails',
    'homeRedCards' => 'strHomeRedCards',
    'homeYellowCards' => 'strHomeYellowCards',
    'homeLineupGoalkeeper' => 'strHomeLineupGoalkeeper',
    'homeLineupDefense' => 'strHomeLineupDefense',
    'homeLineupMidfield' => 'strHomeLineupMidfield',
    'homeLineupForward' => 'strHomeLineupForward',
    'homeLineupSubstitues' => 'strHomeLineupSubstitutes',
    'homeFormation' => 'strHomeFormation',
    'awayRedCards' => 'strAwayRedCards',
    'awayYellowCards' => 'strAwayYellowCards',
    'awayGoalDetails' => 'strAwayGoalDetails',
    'awayLineupGoalkeeper' => 'strAwayLineupGoalkeeper',
    'awayLineupDefense' => 'strAwayLineupDefense',
    'awayLineupMidfield' => 'strAwayLineupMidfield',
    'awayLineupForward' => 'strAwayLineupForward',
    'awayLineupSubstitutes' => 'strAwayLineupSubstitutes',
    'awayFormation' => 'strAwayFormation',
    'homeShots' => 'intHomeShots',
    'awayShots' => 'intAwayShots',
    'date' => 'dateEvent',
    'time' => 'strTime',
    'tvStation' => 'strTVStation',
    'homeTeam' => 'idHomeTeam',
    'awayTeam' => 'idAwayTeam',
    'result' => 'strResult',
    'circuit' => 'strCircuit',
    'country' => 'strCountry',
    'city' => 'strCity',
    'poster' => 'strPoster',
    'thumb' => 'strThumb',
    'banner' => 'strBanner',
    'map' => 'strMap',
    'locked' => 'strLocked',
    // idSoccerXML
    // strLeague
    // strHomeTeam
    // strAwayTeam
    // strFanart
  );

  /**
   * {@inheritdoc}
   */
  protected $propertyCallbacks = array(
    'league' => 'mapLeague',
    'season' => 'mapSeason',
    'homeTeam' => 'mapHomeTeam',
    'awayTeam' => 'mapAwayTeam',
  );
  
  /**
   * The league factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $leagueFactory;

  /**
   * The team factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $teamFactory;

  /**
   * The season factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $seasonFactory;

  protected $destinationClass = 'TheSportsDb\Entity\Event';

  public function setLeagueFactory(FactoryInterface $leagueFactory) {
    $this->leagueFactory = $leagueFactory;
  }

  public function setTeamFactory(FactoryInterface $teamFactory) {
    $this->teamFactory = $teamFactory;
  }

  public function setSeasonFactory(FactoryInterface $seasonFactory) {
    $this->seasonFactory = $seasonFactory;
  }

  public function mapLeague($leagueId, \stdClass $values, $reverse = FALSE) {
    if (!$reverse && !($this->leagueFactory instanceof FactoryInterface)) {
        throw new \Exception('No league factory set.');
    }
    return $reverse ? $leagueId->getId() : $this->leagueFactory->create((object) array('idLeague' => $leagueId));
  }

  public function mapSeason($season, \stdClass $values, $reverse = FALSE) {
    if (!$reverse && !($this->seasonFactory instanceof FactoryInterface)) {
        throw new \Exception('No season factory set.');
    }
    return $reverse ? 
      (object) array('idLeague' => $season->getLeague()->getId(), 'strSeason' => $season->getId())
      : $this->seasonFactory->create((object) array('idLeague' => $values->idLeague, 'strSeason' => $season));
  }

  public function mapHomeTeam($homeTeam, \stdClass $values, $reverse = FALSE) {
    if (!$reverse && !($this->teamFactory instanceof FactoryInterface)) {
        throw new \Exception('No team factory set.');
    }
    return $reverse ? $homeTeam->getId() : $this->teamFactory->create((object) array('idTeam' => $homeTeam, 'strTeam' => $values->strHomeTeam));
  }

  public function mapAwayTeam($awayTeam, \stdClass $values, $reverse = FALSE) {
    if (!$reverse && !($this->teamFactory instanceof FactoryInterface)) {
        throw new \Exception('No team factory set.');
    }
    return $reverse ? $awayTeam->getId() : $this->teamFactory->create((object) array('idTeam' => $awayTeam, 'strTeam' => $values->strAwayTeam));
  }

}
