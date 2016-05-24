<?php
/**
 * @file
 * Contains \TheSportsDb\PropertyMapper\TeamPropertyMapper.
 */

namespace TheSportsDb\PropertyMapper;

use TheSportsDb\Factory\FactoryInterface;

/**
 * Property mapper for teams.
 *
 * @author Jelle Sebreghts
 */
class TeamPropertyMapper extends AbstractPropertyMapper {

  protected $destinationClass = 'TheSportsDb\Entity\Team';

  /**
   * {@inheritdoc}
   */
  protected $propertyMap = array(
    'id' => 'idTeam',
    'name' => 'strTeam',
    'teamShort' => 'strTeamShort',
    'alternateName' => 'strAlternate',
    'formedYear' => 'strFormedYear',
    'sport' => 'strSport',
    'league' => 'idLeague',
    'division' => 'strDivision',
    'manager' => 'strManager',
	'stadium' => 'strStadium',
    'keywords' => 'strKeywords',
	'rss' => 'strRSS',
    'stadiumThumb' => 'strStadiumThumb',
    'stadiumDescription' => 'strStadiumDescription',
	'stadiumLocation' => 'strStadiumLocation',
	'stadiumCapacity' => 'intStadiumCapacity',
	'website' => 'strWebsite',
    'facebook' => 'strFacebook',
	'twitter' => 'strTwitter',
	'instagram' => 'strInstagram',
	'description' => 'strDescriptionEN',
	'gender' => 'strGender',
    'country' => 'strCountry',
	'badge' => 'strTeamBadge',
    'jersey' => 'strTeamJersey',
	'logo' => 'strTeamLogo',
	'banner' => 'strTeamBanner',
	'youtube' => 'strYoutube',
    'locked' => 'strLocked',
    // idSoccerXML
    // intLoved
    // strLeague
    // strDescriptionDE
	// strDescriptionFR
	// strDescriptionCN
	// strDescriptionIT
	// strDescriptionJP
	// strDescriptionRU
	// strDescriptionES
	// strDescriptionPT
	// strDescriptionSE
	// strDescriptionNL
	// strDescriptionHU
	// strDescriptionNO
	// strDescriptionIL
	// strDescriptionPL
    // strTeamFanart1
	// strTeamFanart2
	// strTeamFanart3
	// strTeamFanart4
  );
  
  /**
   * {@inheritdoc}
   */
  protected $propertyCallbacks = array(
    'sport' => 'mapSport',
    'league' => 'mapLeague',
  );

  /**
   * The league factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $leagueFactory;

  /**
   * The sport factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $sportFactory;


  public function setSportFactory(FactoryInterface $sportFactory) {
    $this->sportFactory = $sportFactory;
  }

  public function setLeagueFactory(FactoryInterface $leagueFactory) {
    $this->leagueFactory = $leagueFactory;
  }

  public function mapSport($sportName, \stdClass $values, $reverse = FALSE) {
    if (!$reverse && !($this->sportFactory instanceof FactoryInterface)) {
        throw new \Exception('No sport factory set.');
    }
    return $reverse ? $sportName->getId() : $this->sportFactory->create((object) array('strSport' => $sportName));
  }

  public function mapLeague($leagueID, \stdClass $values, $reverse = FALSE) {
    if (!$reverse) {
      if (!($this->leagueFactory instanceof FactoryInterface)) {
        throw new \Exception('No league factory set.');
      }
      $leagueData = (object) array(
        'idLeague' => $leagueID,
      );
      if (isset($values->strLeague)) {
        $leagueData->strLeague = $values->strLeague;
      }
      return $this->leagueFactory->create($leagueData);
    }
    return (object) array(
      'idLeague' => $leagueID->getId(),
    );
  }
}
