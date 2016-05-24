<?php
/**
 * @file
 * Contains \TheSportsDb\PropertyMapper\LeaguePropertyMapper.
 */

namespace TheSportsDb\PropertyMapper;

use TheSportsDb\Factory\FactoryInterface;

/**
 * Property mapper for leagues.
 *
 * @author Jelle Sebreghts
 */
class LeaguePropertyMapper extends AbstractPropertyMapper {

  /**
   * {@inheritdoc}
   */
  protected $propertyMap = array(
    'id' => 'idLeague',
    'name' => 'strLeague',
    'sportName' => 'strSport',
    'alternateName' => 'strLeagueAlternate',
    'formedYear' => 'intFormedYear',
    'dateFirstEvent' => 'dateFirstEvent', //"2013-03-02",
    'gender' => 'strGender',
    'country' => 'strCountry',
    'website' => 'strWebsite',
    'facebook' => 'strFacebook',
    'twitter' => 'strTwitter',
    'youtube' => 'strYoutube',
    'rss' => 'strRSS',
    'description' => 'strDescriptionEN',
    'banner' => 'strBanner',
    'badge' => 'strBadge',
    'logo' => 'strLogo',
    'poster' => 'strPoster',
    'trophy' => 'strTrophy',
    'naming' => 'strNaming',
    'locked' => 'strLocked',
    'seasons' => 'seasons',
    // idSoccerXML
    // strDescriptionDE
    // strDescriptionFR
    // strDescriptionIT
    // strDescriptionCN
    // strDescriptionJP
    // strDescriptionRU
    // strDescriptionES
    // strDescriptionPT
    // strDescriptionSE
    // strDescriptionNL
    // strDescriptionHU
    // strDescriptionNO
    // strDescriptionPL
    // strFanart1
    // strFanart2
    // strFanart3
    // strFanart4
  );

  protected $propertyCallbacks = array(
    'seasons' => 'mapSeasons',
  );

  /**
   * The season factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $seasonFactory;

  protected $destinationClass = 'TheSportsDb\Entity\League';

  public function setSeasonFactory(FactoryInterface $seasonFactory) {
    $this->seasonFactory = $seasonFactory;
  }

  public function mapSeasons(array $seasons, \stdClass $values, $reverse = FALSE) {
    $mapped_seasons = array();
    if (!$reverse) {
      if (!($this->seasonFactory instanceof FactoryInterface)) {
        throw new \Exception('No season factory set.');
      }
      foreach ($seasons as $season) {
        $mapped_seasons[] = $this->seasonFactory->create((object) array('idLeague' => $values->idLeague, 'strSeason' => $season->strSeason));
      }
      return $mapped_seasons;
    }
    foreach ($seasons as $season) {
      $mapped_seasons[] = (object) array('idLeague' => $season->getLeague()->getId(), 'strSeason' => $season->getId());
    }
    return $mapped_seasons;
  }

}
